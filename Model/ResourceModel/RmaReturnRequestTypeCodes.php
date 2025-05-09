<?php

namespace Skuld\OrderReturn\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class RmaReturnRequestTypeCodes extends AbstractDb
{

    protected function _construct()
    {
        $this->_init('rma_return_request_type_codes', 'id');
    }
}
