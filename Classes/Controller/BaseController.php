<?php
namespace T3Monitor\T3monitoring\Controller;


use T3Monitor\T3monitoring\Domain\Model\Dto\ClientFilterDemand;
use T3Monitor\T3monitoring\Domain\Model\Dto\EmMonitoringConfiguration;
use T3Monitor\T3monitoring\Domain\Repository\ClientRepository;
use T3Monitor\T3monitoring\Domain\Repository\CoreRepository;
use T3Monitor\T3monitoring\Domain\Repository\SlaRepository;
use T3Monitor\T3monitoring\Domain\Repository\StatisticRepository;
use TYPO3\CMS\Backend\View\BackendTemplateView;
use TYPO3\CMS\Core\Imaging\Icon;
use TYPO3\CMS\Core\Imaging\IconFactory;
use TYPO3\CMS\Core\Page\PageRenderer;
use TYPO3\CMS\Core\Registry;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Mvc\View\ViewInterface;
use TYPO3\CMS\Extbase\Mvc\Web\Routing\UriBuilder;
use TYPO3\CMS\Lang\LanguageService;

class BaseController extends ActionController
{

    public function initializeAction()
    {
        $this->statisticRepository = $this->objectManager->get(StatisticRepository::class);
        $this->filterDemand = $this->objectManager->get(ClientFilterDemand::class);
        $this->clientRepository = $this->objectManager->get(ClientRepository::class);
        $this->coreRepository = $this->objectManager->get(CoreRepository::class);
        $this->iconFactory = GeneralUtility::makeInstance(IconFactory::class);
        $this->registry = GeneralUtility::makeInstance(Registry::class);
        $this->emConfiguration = GeneralUtility::makeInstance(EmMonitoringConfiguration::class);

        parent::initializeAction();
    }

    /** @var BackendTemplateView */
    protected $view;

    /** @var  StatisticRepository */
    protected $statisticRepository;

    /** @var  ClientRepository */
    protected $clientRepository;

    /** @var CoreRepository */
    protected $coreRepository;

    /** @var SlaRepository */
    protected $slaRepository;

    /** @var  ClientFilterDemand */
    protected $filterDemand;

    /** @var  BackendTemplateView */
    protected $defaultViewObjectName = BackendTemplateView::class;

    /** @var IconFactory */
    protected $iconFactory;

    /** @var  Registry */
    protected $registry;

    /** @var EmMonitoringConfiguration */
    protected $emConfiguration;


    /**
     * Set up the doc header properly here
     *
     * @param ViewInterface $view
     */
    protected function initializeView(ViewInterface $view)
    {
        /** @var BackendTemplateView $view */
        parent::initializeView($view);
        $view->getModuleTemplate()->getDocHeaderComponent()->setMetaInformation([]);

        /** @var PageRenderer $pageRenderer */
        $pageRenderer = GeneralUtility::makeInstance(PageRenderer::class);
        $pageRenderer->loadRequireJsModule('TYPO3/CMS/Backend/Tooltip');

        $this->createMenu();
        $this->getButtons();
    }

    protected function createMenu()
    {
        $menu = $this->view->getModuleTemplate()->getDocHeaderComponent()->getMenuRegistry()->makeMenu();
        $menu->setIdentifier('t3monitoring');

        $actions = [
            ['controller' => 'Statistic', 'action' => 'index', 'label' => 'Home'],
            ['controller' => 'Extension', 'action' => 'list', 'label' => 'Extension list'],
            ['controller' => 'Core', 'action' => 'list', 'label' => 'Core versions'],
            ['controller' => 'Sla', 'action' => 'list', 'label' => 'SLA'],
            ['controller' => 'Statistic', 'action' => 'administration', 'label' => 'Administration'],
        ];

        foreach ($actions as $action) {
            $isActive = $this->request->getControllerActionName() === $action['action']
//                && $this->request->getControllerName() == $action['controller']
            ;

            $item = $menu->makeMenuItem()
                ->setTitle($action['label'])
                ->setHref($this->getUriBuilder()->reset()->uriFor($action['action'], [], $action['controller']))
                ->setActive($isActive);
            $menu->addMenuItem($item);
        }

        $this->view->getModuleTemplate()->getDocHeaderComponent()->getMenuRegistry()->addMenu($menu);
    }

    /**
     * Create the panel of buttons for submitting the form or otherwise perform operations.
     */
    protected function getButtons()
    {
        $buttonBar = $this->view->getModuleTemplate()->getDocHeaderComponent()->getButtonBar();
//        // CSH
//        $cshButton = $buttonBar->makeHelpButton()
//            ->setModuleName('_MOD_tools_T3monitoringT3monitor') // todo
//            ->setFieldName('');
//        $buttonBar->addButton($cshButton);

        // Home
        if (($this->request->getControllerName() !== 'Statistic'
                || $this->request->getControllerActionName() !== 'index')
            || $this->request->hasArgument('filter')
        ) {
            $viewButton = $buttonBar->makeLinkButton()
                ->setTitle('Home')
                ->setHref($this->getUriBuilder()->reset()->uriFor('index', [], 'Statistic'))
                ->setIcon($this->iconFactory->getIcon('actions-view-go-back', Icon::SIZE_SMALL));
            $buttonBar->addButton($viewButton);
        }
    }

    /**
     * @return UriBuilder
     */
    protected function getUriBuilder()
    {
        /** @var UriBuilder $uriBuilder */
        $uriBuilder = $this->objectManager->get(UriBuilder::class);
        $uriBuilder->setRequest($this->request);

        return $uriBuilder;
    }

    /**
     * @return ClientFilterDemand
     */
    protected function getClientFilterDemand()
    {
        return $this->objectManager->get(ClientFilterDemand::class);
    }

    /**
     * Returns the LanguageService
     *
     * @return LanguageService
     */
    protected function getLanguageService()
    {
        return $GLOBALS['LANG'];
    }

}