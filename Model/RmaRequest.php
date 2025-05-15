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

    public function getReturnRequestId(): string
    {
        return (string) $this->getData('return_request_id');
    }

    public function setReturnRequestId($returnRequestId): RmaRequestInterface
    {
        $this->setData('return_request_id', $returnRequestId);
        return $this;
    }

    public function getStatus(): string
    {
        return (string) $this->getData('status');
    }

    public function setStatus($status): RmaRequestInterface
    {
        $this->setData('status', $status);
        return $this;
    }

    public function getIsActive(): bool
    {
        return (bool) $this->getData('is_active');
    }

    public function setIsActive(bool $isActive): RmaRequestInterface
    {
        $this->setData('is_active', ($isActive) ? 1 : 0);
        return $this;
    }

    public function getSalesOrganization(): int
    {
        return (int) $this->getData('sales_organization');
    }

    public function setSalesOrganization($salesOrganization): RmaRequestInterface
    {
        $this->setData('sales_organization', $salesOrganization);
        return $this;
    }

    public function getDistributionChannel(): int
    {
        return (int) $this->getData('distribution_channel');
    }

    public function setDistributionChannel($distributionChannel): RmaRequestInterface
    {
        $this->getData('distribution_channel', $distributionChannel);
        return $this;
    }

    public function getSoldToParty(): int
    {
        return (int) $this->getData('sold_to_party');
    }

    public function setSoldToParty($soldToParty): RmaRequestInterface
    {
        $this->setData('sold_to_party', $soldToParty);
        return $this;
    }

    public function getCustomerCustomEmail(): string
    {
        return (string) $this->getData('customer_custom_email');
    }

    public function setCustomerCustomEmail($customerCustomEmail): RmaRequestInterface
    {
        $this->setData('customer_custom_email', $customerCustomEmail);
        return $this;
    }

    public function getOrderId(): int
    {
        return (int) $this->getData('order_id');
    }

    public function setOrderId(int $orderId): RmaRequestInterface
    {
        $this->setData('order_id', $orderId);
        return $this;
    }

    public function getOrderIncrementId(): ?string
    {
        return ($this->hasData('order_increment_id')) ? (string) $this->getData('order_increment_id') : null;
    }

    public function setOrderIncrementId(string $orderIncrementId): RmaRequestInterface
    {
        $this->setData('order_increment_id', $orderIncrementId);
        return $this;
    }

    public function getReturnRequestTypeId(): int
    {
        return (int) $this->getData('return_request_type_id');
    }

    public function setReturnRequestTypeId(int $returnRequestTypeId): RmaRequestInterface
    {
        $this->setData('return_request_type_id', $returnRequestTypeId);
        return $this;
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
