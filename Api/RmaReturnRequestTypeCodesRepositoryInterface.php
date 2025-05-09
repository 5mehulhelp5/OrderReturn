<?php

namespace Skuld\OrderReturn\Api;

use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Skuld\OrderReturn\Api\Data\RmaReturnRequestTypeCodesInterface;


interface RmaReturnRequestTypeCodesRepositoryInterface
{
    /**
     * @param \Skuld\OrderReturn\Api\Data\RmaReturnRequestTypeCodesInterface | \Magento\Framework\Model\AbstractModel $rmaReturnRequestTypeCode
     * @return \Skuld\OrderReturn\Api\Data\RmaReturnRequestTypeCodesInterface
     * @throws CouldNotSaveException
     */
    public function save(RmaReturnRequestTypeCodesInterface $rmaReturnRequestTypeCode): RmaReturnRequestTypeCodesInterface;

    /**
     * @param int $returnRequestTypeCodeId
     * @return RmaReturnRequestTypeCodesInterface
     * @throws NoSuchEntityException
     */
    public function getById(int $returnRequestTypeCodeId): RmaReturnRequestTypeCodesInterface;

    /**
     * @param \Skuld\OrderReturn\Api\Data\RmaReturnRequestTypeCodesInterface | \Magento\Framework\Model\AbstractModel $rmaReturnRequestTypeCode
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(RmaReturnRequestTypeCodesInterface $rmaReturnRequestTypeCode): bool;

    /**
     * @param int $returnRequestTypeCodeId
     * @return bool
     * @throws NoSuchEntityException
     * @throws CouldNotDeleteException
     */
    public function deleteById(int $returnRequestTypeCodeId): bool;
}
