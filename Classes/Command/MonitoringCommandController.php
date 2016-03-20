<?php

namespace T3Monitor\Command;

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

use T3Monitor\T3monitoring\Service\Import\ClientImport;
use T3Monitor\T3monitoring\Service\Import\CoreImport;
use T3Monitor\T3monitoring\Service\Import\ExtensionImport;
use TYPO3\CMS\Extbase\Mvc\Controller\CommandController;

/**
 * CLI Tasks
 */
class MonitoringCommandController extends CommandController
{

    /**
     * Import all core versions
     */
    public function importCoreCommand()
    {
        /** @var CoreImport $import */
        $import = $this->objectManager->get(CoreImport::class);
        $import->run();
    }

    /**
     * Import all extensions
     */
    public function importExtensionsCommand()
    {
        /** @var ExtensionImport $import */
        $import = $this->objectManager->get(ExtensionImport::class);
        $import->run();
    }

    /**
     * Import all clients
     */
    public function importClientsCommand()
    {
        /** @var ClientImport $import */
        $import = $this->objectManager->get(ClientImport::class);
        $import->run();

        $result = $import->getResponseCount();
        foreach ($result as $label => $count) {
            $this->outputLine(sprintf('%s: %s', $label, $count));
        }
    }

    /**
     * Import all
     */
    public function importAllCommand()
    {
        $this->importCoreCommand();
        $this->importExtensionsCommand();
        $this->importClientsCommand();
    }
}