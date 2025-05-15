<?php

namespace Skuld\OrderReturn\Api\Data;

interface RmaRequestInterface
{
    public function getId();

    public function getReturnRequestId(): int;

    public function setReturnRequestId($returnRequestId): RmaRequestInterface;

    public function getStatus(): string;

    public function setStatus($status): RmaRequestInterface;

    public function getIsActive(): bool;

    public function setIsActive($isActive): RmaRequestInterface;

    public function getSalesOrganization(): int;

    public function setSalesOrganization($salesOrganization): RmaRequestInterface;

    public function getDistributionChannel(): int;

    public function setDistributionChannel($distributionChannel): RmaRequestInterface;

    public function getSoldToParty(): int;

    public function setSoldToParty($soldToParty): RmaRequestInterface;

    public function getCustomerCustomEmail(): string;

    public function setCustomerCustomEmail($customerCustomEmail): RmaRequestInterface;

    public function getOrderId(): int;

    public function setOrderId(int $orderId): RmaRequestInterface;

    public function getOrderIncrementId(): ?string;

    public function setOrderIncrementId(string $orderIncrementId): RmaRequestInterface;

    public function getReturnRequestTypeId(): int;

    public function setReturnRequestTypeId(int $returnRequestTypeId): RmaRequestInterface;

    public function getDeletedAt(): ?\DateTime;

    public function setDeletedAt(\DateTime $deletedAt): RmaRequestInterface;
}
