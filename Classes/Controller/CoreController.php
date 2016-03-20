<?php
namespace T3Monitor\T3monitoring\Controller;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2016 Georg Ringer, www.sup7.at
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * CoreController
 */
class CoreController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * coreRepository
     *
     * @var \T3Monitor\T3monitoring\Domain\Repository\CoreRepository
     * @inject
     */
    protected $coreRepository = NULL;
    
    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $cores = $this->coreRepository->findAll();
        $this->view->assign('cores', $cores);
    }
    
    /**
     * action show
     *
     * @param \T3Monitor\T3monitoring\Domain\Model\Core $core
     * @return void
     */
    public function showAction(\T3Monitor\T3monitoring\Domain\Model\Core $core)
    {
        $this->view->assign('core', $core);
    }

}