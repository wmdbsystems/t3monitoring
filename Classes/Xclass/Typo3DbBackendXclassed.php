<?php

namespace T3Monitor\T3monitoring\Xclass;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use TYPO3\CMS\Extbase\Persistence\Generic\Storage\Typo3DbBackend;

/**
 * Xclassed Typo3DbBackend
 */
class Typo3DbBackendXclassed extends Typo3DbBackend
{

    /**
     * Fetches the rows directly from the database, not using prepared statement
     *
     * @param array $statementParts
     * @return array the result
     */
    protected function getRowsFromDatabase(array $statementParts)
    {
        $queryCommandParameters = $this->createQueryCommandParametersFromStatementParts($statementParts);

        // Xclass start
        if ($queryCommandParameters['orderBy'] === 'tx_t3monitoring_client_extension_mm.sorting ASC' && $queryCommandParameters['selectFields'] === ' tx_t3monitoring_domain_model_extension.*') {
            $queryCommandParameters['orderBy'] = 'tx_t3monitoring_domain_model_extension.insecure DESC, tx_t3monitoring_client_extension_mm.is_loaded ASC, tx_t3monitoring_domain_model_extension.name asc';
        }
        // Xclass end

        $rows = $this->databaseHandle->exec_SELECTgetRows(
            $queryCommandParameters['selectFields'],
            $queryCommandParameters['fromTable'],
            $queryCommandParameters['whereClause'],
            '',
            $queryCommandParameters['orderBy'],
            $queryCommandParameters['limit']
        );
        $this->checkSqlErrors();

        return $rows;
    }
}