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
            $output[] = '<tr><th colspan="2">' . htmlspecialchars(ucfirst($type)) . '</th></tr>';
            foreach ($list as $item => $version) {
                $output[$type] .= sprintf('<tr><td>%s</td><td>%s</td></tr>', htmlspecialchars($item), htmlspecialchars($version));
            }
        }

        return '<table class="table table-white table-striped table-hover">' . implode(LF, $output) . '</table>';
    }
}