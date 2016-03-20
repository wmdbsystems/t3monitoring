<?php
namespace T3Monitor\T3monitoring\Controller;


use T3Monitor\T3monitoring\Service\Import\ClientImport;
use T3Monitor\T3monitoring\Service\Import\CoreImport;
use T3Monitor\T3monitoring\Service\Import\ExtensionImport;
use T3Monitor\T3monitoring\Domain\Model\Dto\ClientFilterDemand;
use T3Monitor\T3monitoring\Domain\Repository\ClientRepository;
use T3Monitor\T3monitoring\Domain\Repository\CoreRepository;
use T3Monitor\T3monitoring\Domain\Repository\SlaRepository;
use T3Monitor\T3monitoring\Domain\Repository\StatisticRepository;
use T3Monitor\T3monitoring\Service\BulletinImport;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class StatisticController extends BaseController
{

    public function initializeAction()
    {
        $this->statisticRepository = $this->objectManager->get(StatisticRepository::class);
        $this->filterDemand = $this->objectManager->get(ClientFilterDemand::class);
        $this->clientRepository = $this->objectManager->get(ClientRepository::class);
        $this->coreRepository = $this->objectManager->get(CoreRepository::class);
        $this->slaRepository = $this->objectManager->get(SlaRepository::class);

        parent::initializeAction();
    }

    public function indexAction(ClientFilterDemand $filter = null)
    {
        if (is_null($filter)) {
            $filter = $this->getClientFilterDemand();
            $this->view->assign('showIntro', true);
        } else {
            $this->view->assign('showSearch', true);
        }

        $errorMessageDemand = $this->getClientFilterDemand()->setWithErrorMessage(true);
        $insecureExtensionsDemand = $this->getClientFilterDemand()->setWithInsecureExtensions(true);
        $insecureCoreDemand = $this->getClientFilterDemand()->setWithInsecureCore(true);
        $outdatedCoreDemand = $this->getClientFilterDemand()->setWithOutdatedCore(true);
        $outdatedExtensionDemand = $this->getClientFilterDemand()->setWithOutdatedExtensions(true);

        /** @var BulletinImport $bulletinImport */
        $bulletinImport = GeneralUtility::makeInstance(BulletinImport::class,
            'https://typo3.org/xml-feeds/security/1/rss.xml', 5);


        $this->view->assignMultiple([
            'filter' => $filter,
            'clients' => $this->clientRepository->findByDemand($filter),
            'coreVersions' => $this->coreRepository->findAll(CoreRepository::USED_ONLY),
            'coreVersionUsage' => $this->statisticRepository->getUsedCoreVersionCount(),
            'clientsWithErrorMessages' => $this->clientRepository->countByDemand($errorMessageDemand),
            'clientsWithInsecureExtensions' => $this->clientRepository->countByDemand($insecureExtensionsDemand),
            'clientsWithOutdatedExtensions' => $this->clientRepository->countByDemand($outdatedExtensionDemand),
            'clientsWithInsecureCore' => $this->clientRepository->countByDemand($insecureCoreDemand),
            'clientsWithOutdatedCore' => $this->clientRepository->countByDemand($outdatedCoreDemand),
            'numberOfClients' => $this->clientRepository->countAll(),
            'slaVersions' => $this->slaRepository->findAll(),
            'feedItems' => $bulletinImport->start(),
            'importTimes' => [
                'client' => $this->registry->get('t3monitoring', 'importClient'),
                'core' => $this->registry->get('t3monitoring', 'importCore'),
                'extension' => $this->registry->get('t3monitoring', 'importExtension'),
            ],
        ]);
    }

    /**
     * @param int $client
     */
    public function clientAction($client = 0)
    {
        if ((int)$client === 0) {
            $this->redirect('index');
        }

        $this->view->assignMultiple([
            'client' => $this->clientRepository->findByUid($client),
        ]);
    }

    /**
     * @param int $version
     */
    public function clientByVersionAction($version = 0)
    {
        if ((int)$version === 0) {
            $this->redirect('index');
        }

        $demand = $this->getClientFilterDemand();
        $demand->setVersion($version);
        $this->view->assignMultiple([
            'version' => $this->coreRepository->findByVersionAsInteger($version),
            'clients' => $this->statisticRepository->getClientsByDemand($demand),
        ]);
    }

    /**
     * @param string $import
     */
    public function administrationAction($import = '')
    {

        $success = $error = false;

        if (!empty($import)) {
            switch ($import) {
                case 'clients':
                    /** @var ClientImport $importService */
                    $importService = $this->objectManager->get(ClientImport::class);
                    $importService->run();
                    $success = true;
                    break;
                case 'extensions':
                    /** @var ExtensionImport $importService */
                    $importService = $this->objectManager->get(ExtensionImport::class);
                    $importService->run();
                    $success = true;
                    break;
                case 'core':
                    /** @var CoreImport $importService */
                    $importService = $this->objectManager->get(CoreImport::class);
                    $importService->run();
                    $success = true;
                    break;
            }
        }

        $this->view->assignMultiple([
            'success' => $success,
            'error' => $error
        ]);
    }
}