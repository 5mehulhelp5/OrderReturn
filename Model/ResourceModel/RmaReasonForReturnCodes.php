<?php

namespace Skuld\OrderReturn\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class RmaReasonForReturnCodes extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('rma_reason_for_return_codes', 'id');
    }
}
