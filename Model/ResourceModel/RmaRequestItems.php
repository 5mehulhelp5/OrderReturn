<?php

namespace Skuld\OrderReturn\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class RmaRequestItems extends AbstractDb
{

    protected function _construct()
    {
        $this->_init('rma_request_items', 'id');
    }
}
