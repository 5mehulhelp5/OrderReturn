<?php

namespace Skuld\OrderReturn\Model;

use Magento\Framework\Model\AbstractModel;
use Skuld\OrderReturn\Api\Data\RmaRequestItemsInterface;
use Skuld\OrderReturn\Model\ResourceModel\RmaRequestItems as RmaRequestItemResourceModel;

class RmaRequestItems extends AbstractModel implements RmaRequestItemsInterface
{
    protected function _construct()
    {
        $this->_init(RmaRequestItemResourceModel::class);
    }

    public function getRmaRequestId(): int
    {
        return (int) $this->getData('rma_request_id');
    }

    public function setRmaRequestId($rmaRequestId): RmaRequestItemsInterface
    {
        $this->setData('rma_request_id', $rmaRequestId);
        return $this;
    }

    public function getReturnRequestItemId(): int
    {
        return (int) $this->getData('return_request_item_id');
    }

    public function setReturnRequestItemId($returnRequestItemId): RmaRequestItemsInterface
    {
        $this->setData('return_request_item_id', $returnRequestItemId);
        return $this;
    }

    public function getProductName(): string
    {
        return (string) $this->getData('product_name');
    }

    public function setProductName($productName): RmaRequestItemsInterface
    {
        $this->setData('product_name', $productName);
        return $this;
    }

    public function getQtyReturned(): float
    {
        return (float) $this->getData('qty_returned');
    }

    public function setQtyReturned($qtyReturned): RmaRequestItemsInterface
    {
        $this->setData('qty_returned', $qtyReturned);
        return $this;
    }

    public function getMaterial(): string
    {
        return (string) $this->getData('material');
    }

    public function setMaterial($material): RmaRequestItemsInterface
    {
        $this->setData('material', $material);
        return $this;
    }

    public function getBaseUnit(): string
    {
        return (string) $this->getData('base_unit');
    }

    public function setBaseUnit($baseUnit): RmaRequestItemsInterface
    {
        $this->setData('base_unit', $baseUnit);
        return $this;
    }

    public function getQtyRequested(): float
    {
        return (float) $this->getData('qty_requested');
    }

    public function setQtyRequested($qtyRequested): RmaRequestItemsInterface
    {
        $this->setData('qty_requested', $qtyRequested);
        return $this;
    }

    public function getQtyAuthorized(): float
    {
        return (float) $this->getData('qty_authorized');
    }

    public function setQtyAuthorized($qtyAuthorized): RmaRequestItemsInterface
    {
        $this->setData('qty_authorized', $qtyAuthorized);
        return $this;
    }

    public function getQtyApproved(): float
    {
        return (float) $this->getData('qty_approved');
    }

    public function setQtyApproved($qtyApproved): RmaRequestItemsInterface
    {
        $this->setData('qty_approved', $qtyApproved);
        return $this;
    }

    public function getProductAdminName(): string
    {
        return (string) $this->getData('product_admin_name');
    }

    public function setProductAdminName($productAdminName): RmaRequestItemsInterface
    {
        $this->setData('product_admin_name', $productAdminName);
        return $this;
    }

    public function getProductAdminSku(): string
    {
        return (string) $this->getData('product_admin_sku');
    }

    public function setProductAdminSku($productAdminSku): RmaRequestItemsInterface
    {
        $this->setData('product_admin_sku', $productAdminSku);
        return $this;
    }

    public function getReasonForReturnId(): int
    {
        return (int) $this->getData('reason_for_return_id');
    }

    public function setReasonForReturnId($reasonForReturnId): RmaRequestItemsInterface
    {
        $this->setData('reason_for_return_id', $reasonForReturnId);
        return $this;
    }
}
