<?php

namespace T3Monitor\T3monitoring\ViewHelpers\Format;

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

use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;

class MysqlVersionViewHelper extends AbstractViewHelper
{

    /**
     * @param string $version
     * @return string
     */
    public function render($version = '')
    {
        $version = $version ?: $this->renderChildren();

        $versionString = str_pad($version, 5, '0', STR_PAD_LEFT);
        $parts = array(
            substr($versionString, 0, 1),
            substr($versionString, 1, 2),
            substr($versionString, 3, 5)
        );

        return (int)$parts[0] . '.' . (int)$parts[1] . '.' . (int)$parts[2];
    }
}