<?php
namespace T3Monitor\T3monitoring\Controller;

use T3Monitor\T3monitoring\Domain\Model\Client;


/**
 * ClientController
 */
class ClientController extends BaseController
{

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $clients = $this->clientRepository->findAll();
        $this->view->assign('clients', $clients);
    }

    /**
     * action show
     *
     * @param Client $client
     * @ignorevalidation $client
     * @return void
     */
    public function showAction(Client $client = null)
    {
        if (is_null($client)) {
            // @todo flash message
            $this->redirect('index', 'Statistic');
        }

        $this->view->assignMultiple([
            'client' => $client,
        ]);
    }

}