<?php
namespace T3Monitor\T3monitoring\Controller;

/**
 * CoreController
 */
class CoreController extends BaseController
{

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