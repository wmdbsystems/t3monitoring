<?php
namespace T3Monitor\T3monitoring\Domain\Repository;

use TYPO3\CMS\Core\Database\DatabaseConnection;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;


/**
 * Base repository
 */
class BaseRepository extends Repository
{

    /**
     * @return DatabaseConnection
     */
    protected function getDatabaseConnection()
    {
        return $GLOBALS['TYPO3_DB'];
    }

    /**
     * @return QueryResultInterface
     */
    public function findAll()
    {
        $query = $this->getQuery();
        return $query->execute();
    }

    /**
     * @return int
     */
    public function countAll()
    {
        $query = $this->getQuery();
        return $query->execute()->count();
    }

    /**
     * @return QueryInterface
     */
    protected function getQuery()
    {
        $query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(false);

        return $query;
    }

}