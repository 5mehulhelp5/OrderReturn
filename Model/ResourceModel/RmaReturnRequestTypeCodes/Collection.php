<?php

namespace Skuld\OrderReturn\Model\ResourceModel\RmaReturnRequestTypeCodes;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Skuld\OrderReturn\Model\RmaReturnRequestTypeCodes;
use Skuld\OrderReturn\Model\ResourceModel\RmaReturnRequestTypeCodes as RmaReturnRequestTypeCodesResourceModel;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(RmaReturnRequestTypeCodes::class, RmaReturnRequestTypeCodesResourceModel::class);
    }

    protected function _initSelect() {
        parent::_initSelect();
        $this->addFieldToFilter('deleted_at', ['null' => true]);
    }
}
