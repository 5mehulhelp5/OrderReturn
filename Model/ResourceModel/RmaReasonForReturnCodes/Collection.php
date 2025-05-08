<?php

namespace Skuld\OrderReturn\Model\ResourceModel\RmaReasonForReturnCodes;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Skuld\OrderReturn\Model\RmaReasonForReturnCodes;
use Skuld\OrderReturn\Model\ResourceModel\RmaReasonForReturnCodes as RmaReasonForReturnCodesResourceModel;


class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(RmaReasonForReturnCodes::class, RmaReasonForReturnCodesResourceModel::class);
    }
}
