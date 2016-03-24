<?php
namespace T3Monitor\T3monitoring\Controller;

use T3Monitor\T3monitoring\Domain\Model\Dto\CoreFilterDemand;
use T3Monitor\T3monitoring\Domain\Repository\CoreRepository;

/**
 * CoreController
 */
class CoreController extends BaseController
{

    /**
     * @param CoreFilterDemand|null $filter
     */
    public function listAction(CoreFilterDemand $filter = null)
    {
        if (is_null($filter)) {
            /** @var CoreFilterDemand $filter */
            $filter = $this->objectManager->get(CoreFilterDemand::class);
            $filter->setUsage(CoreRepository::USED_ONLY);
        }

        $this->view->assignMultiple([
            'filter' => $filter,
            'cores' => $this->coreRepository->findByDemand($filter)
        ]);
    }

}