<?php

namespace T3Monitor\T3monitoring\ViewHelpers;

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

class AvailableUpdatesViewHelper extends AbstractViewHelper
{


    /**
     * @param Extension $extension
     * @param string $as
     * @return string
     */
    public function render(Extension $extension, $as = 'list')
    {
        $versions = [
            'bugfix' => $extension->getLastBugfixRelease(),
            'minor' => $extension->getLastMinorRelease(),
            'major' => $extension->getLastMajorRelease()
        ];

        $result = [];
        foreach ($versions as $name => $version) {
            if (!empty($version) && $extension->getVersion() !== $version && !isset($result[$version])) {
                $result[$version] = $name;
            }
        }

        $this->templateVariableContainer->add($as, $result);
        $output = $this->renderChildren();
        $this->templateVariableContainer->remove($as);

        return $output;
    }
}