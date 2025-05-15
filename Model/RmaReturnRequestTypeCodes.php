<?php

namespace Skuld\OrderReturn\Model;

use Magento\Framework\Model\AbstractModel;
use Skuld\OrderReturn\Api\Data\RmaReturnRequestTypeCodesInterface;
use Skuld\OrderReturn\Model\ResourceModel\RmaReturnRequestTypeCodes as ResourceModelRmaReturnRequestTypeCodes;

class RmaReturnRequestTypeCodes extends AbstractModel implements RmaReturnRequestTypeCodesInterface
{
    protected function _construct()
    {
        $this->_init(ResourceModelRmaReturnRequestTypeCodes::class);
    }

    public function getCode(): string
    {
        return (string) $this->getData('code');
    }

    public function setCode(string $code): RmaReturnRequestTypeCodesInterface
    {
        $this->setData('code', $code);
        return $this;
    }

    public function getDescription(): string
    {
        return (string) $this->getData('description');
    }

    public function setDescription(string $description): RmaReturnRequestTypeCodesInterface
    {
        $this->setData('description', $description);
        return $this;
    }

    public function getDeletedAt(): ?\DateTime
    {
        $dateString = $this->getData('deleted_at');
        return ($dateString) ? new \DateTime($dateString) : null;
    }

    public function setDeletedAt(\DateTime $deletedAt): RmaReturnRequestTypeCodesInterface
    {
        $this->setdata('deleted_at', $deletedAt->format('Y-m-d H:i:s'));
        return $this;
    }
}
