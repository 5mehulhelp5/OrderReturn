<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Skuld\OrderReturn\Setup\Patch\Data;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

/**
* Patch is mechanism, that allows to do atomic upgrade data changes
*/
class InsertReturnRequestTypeCodes implements DataPatchInterface
{
    /**
     * @var ModuleDataSetupInterface $moduleDataSetup
     */
    private $moduleDataSetup;

    /**
     * @param ModuleDataSetupInterface $moduleDataSetup
     */
    public function __construct(ModuleDataSetupInterface $moduleDataSetup)
    {
        $this->moduleDataSetup = $moduleDataSetup;
    }

    /**
     * Do Upgrade
     *
     * @return void
     */
    public function apply()
    {
        /**
         * Fill table rma_return_request_type_codes
         */
        $data = [
            ["RE", "Standard Return"],
            ["RP", "Return Due to Pricing Issue"],
            ["RD", "Return Due to Damage"],
            ["RW", "Return Due to Wrong Item Shipped"],
            ["RQ", "Return Due to Quality Issue"],
            ["RX", "Return Due to Expired Product"],
            ["RC", "Return Due to Order Cancellation"],
            ["REX", "Return for Exchange"],
            ["RF", "Return Due to Defective Item"],
            ["RL", "Return Due to Late Delivery"],
            ["RS", "Return Due to Customer Dissatisfaction"],
            ["RO", "Return Due to Overdelivery"],
            ["RA", "Return Due to Missing Accessories"],
            ["RPAC", "Return Due to Packaging Issue"],
            ["RWAR", "Return Due to Warranty Claim"],
            ["RCON", "Return Due to Contractual Agreement"],
            ["RSP", "Return Due to Store Policy"],
            ["RREC", "Return Due to Product Recall"],
            ["RSD", "Return Due to Shipping Damage"],
            ["RSUP", "Return Due to Supplier Defect"],
            ["ZRMA", "Return Merchandise Authorization (Custom)"],
            ["ZRREPL", "Return for Replacement (Custom)"],
            ["ZRWARRANTY", "Return Due to Warranty Issue (Custom)"],
            ["ZRDAMAGED", "Return Due to Damaged Product (Custom)"],
            ["ZRCUSTOMER_ERR", "Return Due to Customer Error (Custom)"],
            ["ZRVENDEDOR_ERR", "Return Due to Vendor Error (Custom)"]
        ];

        foreach ($data as $row) {
            $bind = ['code' => $row[0], 'description' => $row[1]];
            $this->moduleDataSetup->getConnection()->insert(
                $this->moduleDataSetup->getTable('rma_return_request_type_codes'),
                $bind
            );
        }
    }

    /**
     * @inheritdoc
     */
    public function getAliases()
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public static function getDependencies()
    {
        return [];
    }
}
