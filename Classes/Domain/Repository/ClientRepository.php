<?php
namespace T3Monitor\T3monitoring\Domain\Repository;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2016 Georg Ringer, www.sup7.at
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/
use T3Monitor\T3monitoring\Domain\Model\Dto\ClientFilterDemand;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;

/**
 * The repository for Clients
 */
class ClientRepository extends BaseRepository
{

    protected $searchFields = ['title', 'domain'];

    public function findByDemand(ClientFilterDemand $demand)
    {
        $query = $this->getQuery();
        $this->setConstraints($demand, $query);

        return $query->execute();
    }

    /**
     * @param ClientFilterDemand $demand
     * @return int
     */
    public function countByDemand(ClientFilterDemand $demand)
    {
        $query = $this->getQuery();
        $this->setConstraints($demand, $query);

        return $query->execute()->count();
    }

    /**
     * @param ClientFilterDemand $demand
     * @param QueryInterface $query
     */
    protected function setConstraints(ClientFilterDemand $demand, QueryInterface $query)
    {
        $constraints = [];

        // SLA
        if ($demand->getSla()) {
            $constraints[] = $query->equals('sla', $demand->getSla());
        }

        // Search
        if ($demand->getSearchWord()) {
            $searchConstraints = [];
            foreach ($this->searchFields as $field) {
                $searchConstraints[] = $query->like($field, '%' . $demand->getSearchWord() . '%');
            }
            if (count($searchConstraints)) {
                $constraints[] = $query->logicalOr($searchConstraints);
            }
        }

        // Version
        if ($demand->getVersion()) {
            $constraints[] = $query->equals('core.versionInteger', $demand->getVersion());
        }

        // error message
        if ($demand->isWithErrorMessage()) {
            $constraints[] = $query->logicalNot($query->equals('errorMessage', ''));
        }

        // insecure extensions
        if ($demand->isWithInsecureExtensions()) {
            $constraints[] = $query->equals('extensions.insecure', 1);
        }

        // outdated extensions
        if ($demand->isWithOutdatedExtensions()) {
            $constraints[] = $query->equals('extensions.isLatest', 0);
        }

        // insecure core
        if ($demand->isWithInsecureCore()) {
            $constraints[] = $query->equals('core.insecure', 1);
        }

        // outdated core
        if ($demand->isWithOutdatedCore()) {
            $constraints[] = $query->equals('core.isLatest', 0);
        }

        // extra info
        if ($demand->isWithExtraInfo()) {
            $constraints[] = $query->logicalNot($query->equals('extraInfo', ''));
        }

        // extra warning
        if ($demand->isWithExtraWarning()) {
            $constraints[] = $query->logicalNot($query->equals('extraWarning', ''));
        }

        // extra danger
        if ($demand->isWithExtraDanger()) {
            $constraints[] = $query->logicalNot($query->equals('extraDanger', ''));
        }


        if (!empty($constraints)) {
            $query->matching(
                $query->logicalAnd($constraints)
            );
        }
    }


}