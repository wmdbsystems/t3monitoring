<?php
namespace T3Monitor\T3monitoring\Controller;

use T3Monitor\T3monitoring\Domain\Model\Dto\ExtensionFilterDemand;


/**
 * ExtensionController
 */
class ExtensionController extends BaseController
{

    /**
     * @param ExtensionFilterDemand $filter
     */
    public function listAction(ExtensionFilterDemand $filter = null)
    {
        if (is_null($filter)) {
            /** @var ExtensionFilterDemand $filter */
            $filter = $this->objectManager->get(ExtensionFilterDemand::class);
        }

        $this->view->assignMultiple([
            'filter' => $filter,
            'extensions' => $this->extensionRepository->findByDemand($filter)
        ]);
    }

    /**
     * action show
     *
     * @param string $extension
     */
    public function showAction($extension = '')
    {
        if (empty($extension)) {
            $this->redirect('list');
        }
        $versions = $this->extensionRepository->findAllVersionsByName($extension);
        $this->view->assignMultiple([
             'versions' => $versions,
            'latest' => $versions->getFirst(),
        ]);
    }

    /**
     * extensionRepository
     *
     * @var \T3Monitor\T3monitoring\Domain\Repository\ExtensionRepository
     * @inject
     */
    protected $extensionRepository = null;

}