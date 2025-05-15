<?php

namespace Skuld\OrderReturn\Api\Data;

interface RmaRequestItemsInterface
{
    public function getId();

    public function getRmaRequestId(): int;

    public function setRmaRequestId($rmaRequestId): RmaRequestItemsInterface;

    public function getReturnRequestItemId(): int;

    public function setReturnRequestItemId($returnRequestItemId): RmaRequestItemsInterface;

    public function getProductName(): ?string;

    public function setProductName($productName): RmaRequestItemsInterface;

    public function getQtyReturned(): ?float;

    public function setQtyReturned($qtyReturned): RmaRequestItemsInterface;

    public function getMaterial(): ?string;

    public function setMaterial($material): RmaRequestItemsInterface;

    public function getBaseUnit(): ?string;

    public function setBaseUnit($baseUnit): RmaRequestItemsInterface;

    public function getQtyRequested(): float;

    public function setQtyRequested($qtyRequested): RmaRequestItemsInterface;

    public function getQtyAuthorized(): ?float;

    public function setQtyAuthorized($qtyAuthorized): RmaRequestItemsInterface;

    public function getQtyApproved(): ?float;

    public function setQtyApproved($qtyApproved): RmaRequestItemsInterface;

    public function getProductAdminName(): string;

    public function setProductAdminName($productAdminName): RmaRequestItemsInterface;

    public function getProductAdminSku(): ?string;

    public function setProductAdminSku($productAdminSku): RmaRequestItemsInterface;

    public function getReasonForReturnId(): int;

    public function setReasonForReturnId($reasonForReturnId): RmaRequestItemsInterface;

    public function getDeletedAt(): ?\DateTime;

    public function setDeletedAt(\DateTime $deletedAt): RmaRequestItemsInterface;
}
