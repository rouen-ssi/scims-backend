<?php

namespace SciMS\Models\Map;

use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;
use SciMS\Models\Article;
use SciMS\Models\ArticleQuery;


/**
 * This class defines the structure of the 'article' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class ArticleTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'SciMS.Models.Map.ArticleTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'scims';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'article';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\SciMS\\Models\\Article';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'SciMS.Models.Article';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 8;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 8;

    /**
     * the column name for the id field
     */
    const COL_ID = 'article.id';

    /**
     * the column name for the account_id field
     */
    const COL_ACCOUNT_ID = 'article.account_id';

    /**
     * the column name for the is_draft field
     */
    const COL_IS_DRAFT = 'article.is_draft';

    /**
     * the column name for the title field
     */
    const COL_TITLE = 'article.title';

    /**
     * the column name for the content field
     */
    const COL_CONTENT = 'article.content';

    /**
     * the column name for the publication_date field
     */
    const COL_PUBLICATION_DATE = 'article.publication_date';

    /**
     * the column name for the category_id field
     */
    const COL_CATEGORY_ID = 'article.category_id';

    /**
     * the column name for the subcategory_id field
     */
    const COL_SUBCATEGORY_ID = 'article.subcategory_id';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'AccountId', 'IsDraft', 'Title', 'Content', 'PublicationDate', 'CategoryId', 'SubcategoryId', ),
        self::TYPE_CAMELNAME     => array('id', 'accountId', 'isDraft', 'title', 'content', 'publicationDate', 'categoryId', 'subcategoryId', ),
        self::TYPE_COLNAME       => array(ArticleTableMap::COL_ID, ArticleTableMap::COL_ACCOUNT_ID, ArticleTableMap::COL_IS_DRAFT, ArticleTableMap::COL_TITLE, ArticleTableMap::COL_CONTENT, ArticleTableMap::COL_PUBLICATION_DATE, ArticleTableMap::COL_CATEGORY_ID, ArticleTableMap::COL_SUBCATEGORY_ID, ),
        self::TYPE_FIELDNAME     => array('id', 'account_id', 'is_draft', 'title', 'content', 'publication_date', 'category_id', 'subcategory_id', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'AccountId' => 1, 'IsDraft' => 2, 'Title' => 3, 'Content' => 4, 'PublicationDate' => 5, 'CategoryId' => 6, 'SubcategoryId' => 7, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'accountId' => 1, 'isDraft' => 2, 'title' => 3, 'content' => 4, 'publicationDate' => 5, 'categoryId' => 6, 'subcategoryId' => 7, ),
        self::TYPE_COLNAME       => array(ArticleTableMap::COL_ID => 0, ArticleTableMap::COL_ACCOUNT_ID => 1, ArticleTableMap::COL_IS_DRAFT => 2, ArticleTableMap::COL_TITLE => 3, ArticleTableMap::COL_CONTENT => 4, ArticleTableMap::COL_PUBLICATION_DATE => 5, ArticleTableMap::COL_CATEGORY_ID => 6, ArticleTableMap::COL_SUBCATEGORY_ID => 7, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'account_id' => 1, 'is_draft' => 2, 'title' => 3, 'content' => 4, 'publication_date' => 5, 'category_id' => 6, 'subcategory_id' => 7, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('article');
        $this->setPhpName('Article');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\SciMS\\Models\\Article');
        $this->setPackage('SciMS.Models');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('article_id_seq');
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('account_id', 'AccountId', 'INTEGER', 'account', 'id', true, null, null);
        $this->addColumn('is_draft', 'IsDraft', 'BOOLEAN', true, null, true);
        $this->addColumn('title', 'Title', 'VARCHAR', true, 128, null);
        $this->addColumn('content', 'Content', 'LONGVARCHAR', true, null, null);
        $this->addColumn('publication_date', 'PublicationDate', 'INTEGER', true, null, null);
        $this->addForeignKey('category_id', 'CategoryId', 'INTEGER', 'category', 'id', false, null, -1);
        $this->addForeignKey('subcategory_id', 'SubcategoryId', 'INTEGER', 'category', 'id', false, null, -1);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('account', '\\SciMS\\Models\\Account', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':account_id',
    1 => ':id',
  ),
), null, null, null, false);
        $this->addRelation('category', '\\SciMS\\Models\\Category', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':category_id',
    1 => ':id',
  ),
), null, null, null, false);
        $this->addRelation('subcategory', '\\SciMS\\Models\\Category', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':subcategory_id',
    1 => ':id',
  ),
), null, null, null, false);
        $this->addRelation('HighlightedArticle', '\\SciMS\\Models\\HighlightedArticle', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':article_id',
    1 => ':id',
  ),
), null, null, 'HighlightedArticles', false);
        $this->addRelation('Comment', '\\SciMS\\Models\\Comment', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':article_id',
    1 => ':id',
  ),
), null, null, 'Comments', false);
    } // buildRelations()

    /**
     *
     * Gets the list of behaviors registered for this table
     *
     * @return array Associative array (name => parameters) of behaviors
     */
    public function getBehaviors()
    {
        return array(
            'validate' => array('title_invalid' => array ('column' => 'title','validator' => 'NotBlank','options' => array ('message' => 'INVALID_TITLE',),), 'content_invalid' => array ('column' => 'content','validator' => 'NotBlank','options' => array ('message' => 'INVALID_CONTENT',),), ),
        );
    } // getBehaviors()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? ArticleTableMap::CLASS_DEFAULT : ArticleTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (Article object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = ArticleTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = ArticleTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + ArticleTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ArticleTableMap::OM_CLASS;
            /** @var Article $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            ArticleTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = ArticleTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = ArticleTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Article $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ArticleTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(ArticleTableMap::COL_ID);
            $criteria->addSelectColumn(ArticleTableMap::COL_ACCOUNT_ID);
            $criteria->addSelectColumn(ArticleTableMap::COL_IS_DRAFT);
            $criteria->addSelectColumn(ArticleTableMap::COL_TITLE);
            $criteria->addSelectColumn(ArticleTableMap::COL_CONTENT);
            $criteria->addSelectColumn(ArticleTableMap::COL_PUBLICATION_DATE);
            $criteria->addSelectColumn(ArticleTableMap::COL_CATEGORY_ID);
            $criteria->addSelectColumn(ArticleTableMap::COL_SUBCATEGORY_ID);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.account_id');
            $criteria->addSelectColumn($alias . '.is_draft');
            $criteria->addSelectColumn($alias . '.title');
            $criteria->addSelectColumn($alias . '.content');
            $criteria->addSelectColumn($alias . '.publication_date');
            $criteria->addSelectColumn($alias . '.category_id');
            $criteria->addSelectColumn($alias . '.subcategory_id');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(ArticleTableMap::DATABASE_NAME)->getTable(ArticleTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(ArticleTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(ArticleTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new ArticleTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Article or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Article object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ArticleTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \SciMS\Models\Article) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ArticleTableMap::DATABASE_NAME);
            $criteria->add(ArticleTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = ArticleQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            ArticleTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                ArticleTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the article table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return ArticleQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Article or Criteria object.
     *
     * @param mixed               $criteria Criteria or Article object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ArticleTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Article object
        }

        if ($criteria->containsKey(ArticleTableMap::COL_ID) && $criteria->keyContainsValue(ArticleTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ArticleTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = ArticleQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // ArticleTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
ArticleTableMap::buildTableMap();