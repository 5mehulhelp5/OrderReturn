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
class InsertReasonForReturnCodes implements DataPatchInterface
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
         * Fill table rma_reason_for_return_codes
         */
        $data = [
            ["DAMAGED", "Damaged Product"],
            ["WRONG_ITEM", "Wrong Item Delivered"],
            ["DEFECTIVE", "Defective Product"],
            ["EXPIRED", "Expired Product"],
            ["CUSTOMER_DISSATISFACTION", "Customer Dissatisfaction"],
            ["PRODUCT_NOT_AS_DESCRIBED", "Product Not as Described"],
            ["QUALITY_ISSUE", "Quality Issue"],
            ["MISSING_ACCESSORIES", "Missing Accessories"],
            ["OVERDELIVERY", "Overdelivery"],
            ["UNDERDELIVERY", "Underdelivery"],
            ["PRICE_DISAGREEMENT", "Price Disagreement"],
            ["NO_LONGER_NEEDED", "No Longer Needed"],
            ["ORDER_CANCELLATION", "Order Cancellation"],
            ["PRODUCT_RECALL", "Product Recall"],
            ["SHIPPING_DAMAGE", "Shipping Damage"],
            ["EXCHANGE_REQUEST", "Exchange Request"],
            ["WRONG_PRODUCT_RECEIVED", "Wrong Product Received"],
            ["SUPPLIER_ERROR", "Supplier Error"],
            ["CUSTOMER_ERROR", "Customer Error"],
            ["WARRANTY_CLAIM", "Warranty Claim"],
            ["PACKAGING_ISSUE", "Packaging Issue"]
        ];

        foreach ($data as $row) {
            $bind = ['code' => $row[0], 'description' => $row[1]];
            $this->moduleDataSetup->getConnection()->insert(
                $this->moduleDataSetup->getTable('rma_reason_for_return_codes'),
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
