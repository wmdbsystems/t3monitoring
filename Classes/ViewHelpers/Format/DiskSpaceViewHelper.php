<?php

namespace T3Monitor\T3monitoring\ViewHelpers\Format;

/*
 * This file is part of the t3monitoring extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * Class DiskSpaceViewHelper
 */
class DiskSpaceViewHelper extends AbstractViewHelper
{

    /**
     * @param int $bytes
     * @return string
     */
    public function render($bytes = 0)
    {
        $bytes = $bytes ?: $this->renderChildren();

        if ($bytes != 0) {
            $si_prefix = ['B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
            $base = 1024;
            $class = min((int)log($bytes, $base), count($si_prefix) - 1);

            return sprintf('%1.2f', $bytes / pow($base, $class)) . ' ' . $si_prefix[$class];
        }

        return 0;
    }
}
