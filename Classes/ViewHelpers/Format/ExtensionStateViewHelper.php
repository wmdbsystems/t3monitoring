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

use DateTime;
use TYPO3\CMS\Backend\Utility\BackendUtility;
use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;

class ExtensionStateViewHelper extends AbstractViewHelper
{

    /**
     * Contains default states.
     *
     * @var array
     */
    protected static $defaultStates = array(
        0 => 'alpha',
        1 => 'beta',
        2 => 'stable',
        3 => 'experimental',
        4 => 'test',
        5 => 'obsolete',
        6 => 'excludeFromUpdates',
        999 => 'n/a'
    );

    /**
     * @param int $state
     * @return string
     */
    public function render($state = 0)
    {
        $state = $state ?: $this->renderChildren();
        $stateString = '';
        if (isset(self::$defaultStates[$state])) {
            $stateString = self::$defaultStates[$state];
        }
        return $stateString;
    }
}