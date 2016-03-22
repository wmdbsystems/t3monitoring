<?php
namespace T3Monitor\T3monitoring\Domain\Repository;

use T3Monitor\T3monitoring\Domain\Model\Dto\ExtensionFilterDemand;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;


/**
 * The repository for Extensions
 */
class ExtensionRepository extends BaseRepository
{

    /** @var array */
    protected $defaultOrderings = [
        'name' => QueryInterface::ORDER_ASCENDING
    ];

    public function findByDemand(ExtensionFilterDemand $demand)
    {
        $rows = $this->getDatabaseConnection()->exec_SELECTgetRows(
            'client.title,client.uid as clientUid,ext.name, ext.version,ext.insecure',
            'tx_t3monitoring_domain_model_extension ext
                RIGHT JOIN tx_t3monitoring_client_extension_mm mm on mm.uid_foreign = ext.uid
                RIGHT JOIN tx_t3monitoring_domain_model_client client on mm.uid_local=client.uid',
            'ext.name is not null' . $this->extendWhereClause($demand),
            '',
            'ext.name,ext.version_integer DESC,client.title'
        );

        $result = [];
        foreach ($rows as $row) {
            $result[$row['name']][$row['version']]['insecure'] = $row['insecure'];
            $result[$row['name']][$row['version']]['clients'][] = $row;
        }
        return $result;
    }

    /**
     * @param ExtensionFilterDemand $demand
     * @return string
     */
    protected function extendWhereClause(ExtensionFilterDemand $demand)
    {
        $table = 'tx_t3monitoring_domain_model_extension';
        $constraints = [];
        // name
        if ($demand->getName()) {
            $searchString = $this->getDatabaseConnection()->quoteStr($demand->getName(), $table);

            if ($demand->isExactSearch()) {
                $constraints[] = 'ext.name = "' . $searchString . '"';
            } else {
                $constraints[] = 'ext.name LIKE "%' .
                    $this->getDatabaseConnection()->escapeStrForLike($searchString, $table) . '%"';
            }
        }

        if (!empty($constraints)) {
            return ' AND ' . implode(' AND ', $constraints);
        } else {
            return '';
        }
    }


}