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

class DependenciesViewHelper extends AbstractViewHelper
{

    /** @var bool */
    protected $escapingInterceptorEnabled = false;

    /**
     * @param string $dependencies
     * @return string
     */
    public function render($dependencies = '')
    {
        $dependencies = $dependencies ?: $this->renderChildren();

        if (empty($dependencies)) {
            return '';
        }

        $dependencies = unserialize($dependencies);
        if (!is_array($dependencies)) {
            return '';
        }
        $output = [];
        foreach ($dependencies as $type => $list) {
            $output[$type] = '<div class="type">' . htmlspecialchars(ucfirst($type)) . '</div>';
            foreach ($list as $item => $version) {
                $output[$type] .= '<br><span>' . htmlspecialchars($item) . '</span>: ' . htmlspecialchars($version);
            }
        }

        return implode('<br>', $output);
    }
}