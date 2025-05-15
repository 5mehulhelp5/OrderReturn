<?php

namespace Skuld\OrderReturn\Model;

use Magento\Framework\Model\AbstractModel;
use Skuld\OrderReturn\Model\ResourceModel\RmaRequest as RmaRequestResourceModel;
use Skuld\OrderReturn\Api\Data\RmaRequestInterface;

class RmaRequest extends AbstractModel implements RmaRequestInterface
{
    protected function _construct()
    {
        $this->_init(RmaRequestResourceModel::class);
    }

    public function getReturnRequestId(): int
    {
        // TODO: Implement getReturnRequestId() method.
    }

    public function setReturnRequestId($returnRequestId): RmaRequestInterface
    {
        // TODO: Implement setReturnRequestId() method.
    }

    public function getStatus(): string
    {
        // TODO: Implement getStatus() method.
    }

    public function setStatus($status): RmaRequestInterface
    {
        // TODO: Implement setStatus() method.
    }

    public function getIsActive(): bool
    {
        // TODO: Implement getIsActive() method.
    }

    public function setIsActive($isActive): RmaRequestInterface
    {
        // TODO: Implement setIsActive() method.
    }

    public function getSalesOrganization(): int
    {
        // TODO: Implement getSalesOrganization() method.
    }

    public function setSalesOrganization($salesOrganization): RmaRequestInterface
    {
        // TODO: Implement setSalesOrganization() method.
    }

    public function getDistributionChannel(): int
    {
        // TODO: Implement getDistributionChannel() method.
    }

    public function setDistributionChannel($distributionChannel): RmaRequestInterface
    {
        // TODO: Implement setDistributionChannel() method.
    }

    public function getSoldToParty(): int
    {
        // TODO: Implement getSoldToParty() method.
    }

    public function setSoldToParty($soldToParty): RmaRequestInterface
    {
        // TODO: Implement setSoldToParty() method.
    }

    public function getCustomerCustomEmail(): string
    {
        // TODO: Implement getCustomerCustomEmail() method.
    }

    public function setCustomerCustomEmail($customerCustomEmail): RmaRequestInterface
    {
        // TODO: Implement setCustomerCustomEmail() method.
    }

    public function getOrderId(): int
    {
        // TODO: Implement getOrderId() method.
    }

    public function setOrderId(int $orderId): RmaRequestInterface
    {
        // TODO: Implement setOrderId() method.
    }

    public function getOrderIncrementId(): ?string
    {
        // TODO: Implement getOrderIncrementId() method.
    }

    public function setOrderIncrementId(string $orderIncrementId): RmaRequestInterface
    {
        // TODO: Implement setOrderIncrementId() method.
    }

    public function getReturnRequestTypeId(): int
    {
        // TODO: Implement getReturnRequestTypeId() method.
    }

    public function setReturnRequestTypeId(int $returnRequestTypeId): RmaRequestInterface
    {
        // TODO: Implement setReturnRequestTypeId() method.
    }

    public function getDeletedAt(): ?\DateTime
    {
        $dateString = $this->getData('deleted_at');
        return ($dateString) ? new \DateTime($dateString) : null;
    }

    public function setDeletedAt(\DateTime $deletedAt): RmaRequestInterface
    {
        $this->setdata('deleted_at', $deletedAt->format('Y-m-d H:i:s'));
        return $this;
    }
}
