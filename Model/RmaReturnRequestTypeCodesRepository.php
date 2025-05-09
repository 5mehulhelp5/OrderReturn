<?php

namespace Skuld\OrderReturn\Model;

use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Model\AbstractModel;
use Skuld\OrderReturn\Api\Data\RmaReturnRequestTypeCodesInterface;
use Skuld\OrderReturn\Api\RmaReturnRequestTypeCodesRepositoryInterface;
use Skuld\OrderReturn\Model\ResourceModel\RmaReturnRequestTypeCodes as RmaReturnRequestTypeCodesResourceModel;
use Skuld\OrderReturn\Model\RmaReturnRequestTypeCodesFactory;

class RmaReturnRequestTypeCodesRepository implements RmaReturnRequestTypeCodesRepositoryInterface
{
    /**
     * @var RmaReturnRequestTypeCodesResourceModel
     */
    private $rmaReturnRequestTypeCodesResourceModel;
    /**
     * @var \Skuld\OrderReturn\Model\RmaReturnRequestTypeCodesFactory
     */
    private $rmaReturnRequestTypeCodesFactory;

    public function __construct(
        RmaReturnRequestTypeCodesResourceModel $rmaReturnRequestTypeCodesResourceModel,
        RmaReturnRequestTypeCodesFactory $rmaReturnRequestTypeCodesFactory
    ) {
        $this->rmaReturnRequestTypeCodesResourceModel = $rmaReturnRequestTypeCodesResourceModel;
        $this->rmaReturnRequestTypeCodesFactory = $rmaReturnRequestTypeCodesFactory;
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
        $returnRequestTypeCode = $this->rmaReturnRequestTypeCodesFactory->create();
        $this->rmaReturnRequestTypeCodesResourceModel->load($returnRequestTypeCode, $returnRequestTypeCodeId);
        if (!$returnRequestTypeCode->getId()) {
            throw new NoSuchEntityException(__('Request type code not found.'));
        }
        return $returnRequestTypeCode;
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
