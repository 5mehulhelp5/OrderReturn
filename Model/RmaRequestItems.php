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

    public function getProductName(): ?string
    {
        return ($this->hasData('product_name')) ? (string) $this->getData('product_name') : null;
    }

    public function setProductName($productName): RmaRequestItemsInterface
    {
        $this->setData('product_name', $productName);
        return $this;
    }

    public function getQtyReturned(): ?float
    {
        return ($this->hasData('qty_returned')) ? (float) $this->getData('qty_returned') : null;
    }

    public function setQtyReturned($qtyReturned): RmaRequestItemsInterface
    {
        $this->setData('qty_returned', $qtyReturned);
        return $this;
    }

    public function getMaterial(): ?string
    {
        return ($this->hasData('material')) ? (string) $this->getData('material') : null;
    }

    public function setMaterial($material): RmaRequestItemsInterface
    {
        $this->setData('material', $material);
        return $this;
    }

    public function getBaseUnit(): ?string
    {
        return ($this->hasData('base_unit')) ? (string) $this->getData('base_unit') : null;
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

    public function getQtyAuthorized(): ?float
    {
        return ($this->hasData('qty_authorized')) ? (float) $this->getData('qty_authorized') : null;
    }

    public function setQtyAuthorized($qtyAuthorized): RmaRequestItemsInterface
    {
        $this->setData('qty_authorized', $qtyAuthorized);
        return $this;
    }

    public function getQtyApproved(): ?float
    {
        return ($this->hasData('qty_approved')) ? (float) $this->getData('qty_approved') : null;
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

    public function getProductAdminSku(): ?string
    {
        return ($this->hasData('product_admin_sku')) ? (string) $this->getData('product_admin_sku') : null;
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

    public function getDeletedAt(): ?\DateTime
    {
        $dateString = $this->getData('deleted_at');
        return ($dateString) ? new \DateTime($dateString) : null;
    }

    public function setDeletedAt(?\DateTime $deletedAt): RmaRequestItemsInterface
    {
        ($deletedAt) ? $deletedAt->format('Y-m-d H:i:s') : null;
        $this->setdata('deleted_at', $deletedAt);
        return $this;
    }

    public function getIsDeleted(): bool
    {
        return (bool) $this->getData('deleted_at');
    }
}
