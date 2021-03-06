<?php

namespace SciMS\Controllers;

use SciMS\Models\Category;
use SciMS\Models\CategoryQuery;
use SciMS\Utils;
use Slim\Http\Request;
use Slim\Http\Response;

class CategoryController {

    const INVALID_PARENT_CATEGORY = 'INVALID_PARENT_CATEGORY';
    const CATEGORY_NOT_FOUND = 'CATEGORY_NOT_FOUND';

    /**
     * Endpoint to get all categories and their subcategories.
     * @param  Request $request a PSR-7 Request object.
     * @param  Response $response a PSR-7 Response object.
     * @return Response a JSON containing all the categories and their subcategories.
     */
    public function getCategories(Request $request, Response $response) {
        // Retreives all the categories.
        $categories = CategoryQuery::create()->find();

        $json = [
            'categories' => []
        ];
        foreach ($categories as $category) {
            $json['categories'][] = $category;
        }

        return $response->withJson($json, 200);
    }

    /**
     * Endpoint to get informations about a category given by its id.
     * Returns an error if the category is not found.
     */
    public function getCategory(Request $request, Response $response, array $args) {
        // Retreives the category given by its id or returns an error if the category is not found.
        $category = CategoryQuery::create()->findPk($args['id']);
        if (!$category) {
            return $response->withJson([
                'errors' => [
                    self::CATEGORY_NOT_FOUND
                ]
            ], 400);
        }

        // Returns the category informations
        return $response->withJson($category, 200);
    }

    /**
     * Endpoint to add a category.
     * @param  Request $request a PSR-7 Request object.
     * @param  Response $response a PSR-7 Response object.
     * @return Response a JSON containing all the categories and their subcategories.
     */
    public function addCategory(Request $request, Response $response) {
        $name = $request->getParsedBodyParam('name');
        $parentCategoryId = $request->getParsedBodyParam('parent_categories', NULL);

        $category = new Category();
        $category->setName($name);

        // Retreives the subcategory given by its id
        if ($parentCategoryId) {
            $parentCategory = CategoryQuery::create()->findPk($parentCategoryId);
            if (!$parentCategory) {
                return $response->withJson([
                    'errors' => [
                        self::INVALID_PARENT_CATEGORY
                    ]
                ], 400);
            }
            $category->setParentCategoryId($parentCategoryId);
        }

        $errors = Utils::validate($category);
        if (count($errors) > 0) {
            return $response->withJson([
                'errors' => $errors
            ], 400);
        }

        $category->save();

        return $response->withJson(['result' => $category], 200);
    }

    /**
     * Endpoint to delete a category given by its id.
     * Returns an HTTP 200 status or a JSON containing errors.
     */
    public function delete(Request $request, Response $response, array $args) {
        // Gets the category id from the url.
        $categoryId = $args['id'];

        // Retreives the category by the given id or returns an error if the category is not found.
        $category = CategoryQuery::create()->findPk($categoryId);
        if (!$category) {
            return $response->withJson([
                'errors' => [
                    self::CATEGORY_NOT_FOUND
                ]
            ], 400);
        }

        // Deletes the category (automatically deletes all its subcategories).
        $category->delete();

        // Returns an http 200 status
        return $response->withStatus(200);
    }

    /**
     * Edit a category given by its id.
     * Returns an http 200 status or a JSON containg errors.
     */
    public function edit(Request $request, Response $response, array $args) {
        // Retreives the category id from the url.
        $categoryId = $args['id'];

        // Retreives the parameters
        $categoryName = $request->getParsedBodyParam('name', '');
        $parentCategoryId = $request->getParsedBodyParam('parent_categories', NULL);

        // Retreives the category by its id or returns an error if the category is not found.
        $category = CategoryQuery::create()->findPk($categoryId);
        if (!$category) {
            return $response->withJson([
                'errors' => [
                    self::CATEGORY_NOT_FOUND
                ]
            ], 400);
        }

        // Updates the category informations
        $category->setName($categoryName);
        $category->setParentCategoryId($parentCategoryId);
        $errors = Utils::validate($category);
        if (count($errors) > 0) {
            return $response->withJson([
                'errors' => $errors
            ], 400);
        }

        $category->save();

        // Save the category informations and returns http 200 status
        return $response->withJson(['result' => $category], 200);
    }

}
