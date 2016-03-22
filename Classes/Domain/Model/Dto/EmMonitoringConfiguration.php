<?php

namespace T3Monitor\T3monitoring\Domain\Model\Dto;

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

use TYPO3\CMS\Core\SingletonInterface;

/**
 * Extension configuration
 */
class EmMonitoringConfiguration implements SingletonInterface
{

    /** @var int */
    protected $pid = 0;

    /** @var bool */
    protected $loadBulletins = true;

    public function __construct()
    {
        $settings = (array)unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['t3monitoring']);
        foreach ($settings as $key => $value) {
            if (property_exists(__CLASS__, $key)) {
                $this->$key = $value;
            }
        }
    }

    /**
     * @return int
     */
    public function getPid()
    {
        return (int)$this->pid;
    }

    /**
     * @return boolean
     */
    public function getLoadBulletins()
    {
        return (bool)$this->loadBulletins;
    }


}