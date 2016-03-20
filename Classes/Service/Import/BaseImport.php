<?php

namespace T3Monitor\T3monitoring\Service\Import;

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

use T3Monitor\T3monitoring\Domain\Model\Dto\EmMonitoringConfiguration;
use TYPO3\CMS\Core\Database\DatabaseConnection;
use TYPO3\CMS\Core\Registry;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class BaseImport
{
    /** @var EmMonitoringConfiguration */
    protected $emConfiguration;

    /** @var Registry */
    protected $registry;

    public function __construct()
    {
        $this->emConfiguration = GeneralUtility::makeInstance(EmMonitoringConfiguration::class);
        $this->registry = GeneralUtility::makeInstance(Registry::class);
    }

    /**
     * @param string $action
     */
    protected function setImportTime($action)
    {
        $this->registry->set('t3monitoring', 'import' . ucfirst($action), $GLOBALS['EXEC_TIME']);
    }

    /**
     * @return DatabaseConnection
     */
    protected function getDatabaseConnection()
    {
        return $GLOBALS['TYPO3_DB'];
    }

}