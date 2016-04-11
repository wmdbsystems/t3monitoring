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

use T3Monitor\T3monitoring\Domain\Model\Extension;
use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;

class ExtensionStateViewHelper extends AbstractViewHelper
{

    /**
     * @param int $state
     * @return string
     */
    public function render($state = 0)
    {
        $state = $state ?: $this->renderChildren();
        $stateString = '';
        if (isset(Extension::$defaultStates[$state])) {
            $stateString = Extension::$defaultStates[$state];
        }
        return $stateString;
    }
}