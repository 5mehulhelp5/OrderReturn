<?php

namespace Skuld\OrderReturn\Model;

use Magento\Framework\Model\AbstractModel;
use Skuld\OrderReturn\Api\Data\RmaReasonForReturnCodesInterface;
use Skuld\OrderReturn\Model\ResourceModel\RmaReasonForReturnCodes as ResourceRmaReasonForReturnCodes;

class RmaReasonForReturnCodes extends AbstractModel implements RmaReasonForReturnCodesInterface
{

    protected function _construct()
    {
        $this->_init(ResourceRmaReasonForReturnCodes::class);
    }

    public function getCode(): string
    {
        return (string) $this->getData('code');
    }

    public function setCode(string $code): RmaReasonForReturnCodesInterface
    {
        $this->setData('code', $code);
        return $this;
    }

    public function getDescription(): string
    {
        return (string) $this->getData('description');
    }

    public function setDescription(string $description): RmaReasonForReturnCodesInterface
    {
        $this->setData('description', $description);
        return $this;
    }
}
