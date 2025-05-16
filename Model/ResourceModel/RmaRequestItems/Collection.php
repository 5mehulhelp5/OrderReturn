<?php

namespace Skuld\OrderReturn\Model\ResourceModel\RmaRequestItems;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Skuld\OrderReturn\Model\RmaRequestItems;
use Skuld\OrderReturn\Model\ResourceModel\RmaRequestItems as RmaRequestItemsResourceModel;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(RmaRequestItems::class, RmaRequestItemsResourceModel::class);
    }

    protected function _initSelect() {
        parent::_initSelect();
        $this->addFieldToFilter('deleted_at', ['null' => true]);
    }
}
