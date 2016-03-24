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

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class CoreFilterDemand extends AbstractEntity
{

    /** @var int */
    protected $usage;

    /**
     * @return int
     */
    public function getUsage()
    {
        return $this->usage;
    }

    /**
     * @param int $usage
     */
    public function setUsage($usage)
    {
        $this->usage = $usage;
    }

}