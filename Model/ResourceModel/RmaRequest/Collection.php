<?php

namespace Skuld\OrderReturn\Model\ResourceModel\RmaRequest;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Skuld\OrderReturn\Model\RmaRequest;
use Skuld\OrderReturn\Model\ResourceModel\RmaRequest as RmaRequestResourceModel;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(RmaRequest::class, RmaRequestResourceModel::class);
    }

    protected function _initSelect() {
        parent::_initSelect();
        $this->addFieldToFilter('deleted_at', ['null' => true]);
    }
}
