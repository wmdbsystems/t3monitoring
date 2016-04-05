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

class ExtensionCategoryViewHelper extends AbstractViewHelper
{

    /**
     * Contains default categories.
     *
     * @var array
     */
    protected static $defaultCategories = array(
        0 => 'be',
        1 => 'module',
        2 => 'fe',
        3 => 'plugin',
        4 => 'misc',
        5 => 'services',
        6 => 'templates',
        8 => 'doc',
        9 => 'example',
        10 => 'distribution'
    );

    /**
     * @param int $category
     * @return string
     */
    public function render($category = 0)
    {
        $category = $category ?: $this->renderChildren();
        $categoryString = '';
        if (isset(self::$defaultCategories[$category])) {
            $categoryString = self::$defaultCategories[$category];
        }
        return $categoryString;
    }
}