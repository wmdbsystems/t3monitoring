<?php
namespace T3Monitor\T3monitoring\Domain\Repository;

/**
 * The repository for Cores
 */
class CoreRepository extends BaseRepository
{
    const USED_ALL = 0;
    const USED_ONLY = 1;
    const USED_NON = 2;

    public function findAll($mode = self::USED_ONLY)
    {
        $query = $this->getQuery();
        if ($mode > 0) {
            $query->matching($query->logicalAnd(
                $query->equals('isUsed', ($mode === self::USED_ONLY ? 1 : 0))
            ));
        }
        return $query->execute();
    }

    public function findByVersionAsInteger($version)
    {
        $query = $this->getQuery();
        return $query->matching(
            $query->logicalAnd(
                $query->equals('versionInteger', $version)
            ))->execute()->getFirst();
    }

}