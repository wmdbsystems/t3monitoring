<?php

namespace T3Monitor\T3monitoring\ViewHelpers;

/*
 * This file is part of the t3monitoring extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

use T3Monitor\T3monitoring\Domain\Model\Extension;
use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;

class AvailableUpdatesViewHelper extends AbstractViewHelper
{
    protected $escapeOutput = false;

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