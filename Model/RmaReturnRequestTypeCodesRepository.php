<?php

namespace Skuld\OrderReturn\Model;

use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Model\AbstractModel;
use Skuld\OrderReturn\Api\Data\RmaReturnRequestTypeCodesInterface;
use Skuld\OrderReturn\Api\RmaReturnRequestTypeCodesRepositoryInterface;
use Skuld\OrderReturn\Model\ResourceModel\RmaReturnRequestTypeCodes as RmaReturnRequestTypeCodesResourceModel;
class RmaReturnRequestTypeCodesRepository implements RmaReturnRequestTypeCodesRepositoryInterface
{
    /**
     * @var RmaReturnRequestTypeCodesResourceModel
     */
    private $rmaReturnRequestTypeCodesResourceModel;

    public function __construct(
        RmaReturnRequestTypeCodesResourceModel $rmaReturnRequestTypeCodesResourceModel
    ) {
        $this->rmaReturnRequestTypeCodesResourceModel = $rmaReturnRequestTypeCodesResourceModel;
    }

    /**
     * {@inheritdoc}
     */
    public function save(RmaReturnRequestTypeCodesInterface $rmaReturnRequestTypeCode): RmaReturnRequestTypeCodesInterface
    {
       if (!($rmaReturnRequestTypeCode instanceof AbstractModel)) {
           throw new CouldNotSaveException(__('The implementation of ReturnRequestTypeCode has changed'));
       }
       try {
           $this->rmaReturnRequestTypeCodesResourceModel->save($rmaReturnRequestTypeCode);
       } catch (\Exception $e) {
           throw new CouldNotSaveException(__($e->getMessage()));
       }
    }

    /**
     * {@inheritdoc}
     */
    public function getById(int $returnRequestTypeCodeId): RmaReturnRequestTypeCodesInterface
    {
        // TODO: Implement getById() method.
    }

    /**
     * {@inheritdoc}
     */
    public function delete(RmaReturnRequestTypeCodesInterface $rmaReturnRequestTypeCode): bool
    {
        // TODO: Implement delete() method.
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById(int $returnRequestTypeCodeId): bool
    {
        // TODO: Implement deleteById() method.
    }
}
