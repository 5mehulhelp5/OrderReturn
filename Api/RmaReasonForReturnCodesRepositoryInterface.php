<?php

namespace Skuld\OrderReturn\Api;

use Skuld\OrderReturn\Api\Data\RmaReasonForReturnCodesInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

interface RmaReasonForReturnCodesRepositoryInterface
{
    /**
     * @param RmaReasonForReturnCodesInterface $orderReturnDetails
     * @return RmaReasonForReturnCodesInterface
     * @throws CouldNotSaveException
     */
    public function save(RmaReasonForReturnCodesInterface $orderReturnDetails): RmaReasonForReturnCodesInterface;

    /**
     * @param int $detailsId
     * @return RmaReasonForReturnCodesInterface
     * @throws NoSuchEntityException
     */
    public function getById(int $detailsId): RmaReasonForReturnCodesInterface;

    /**
     * @param RmaReasonForReturnCodesInterface $exportDetails
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(RmaReasonForReturnCodesInterface $exportDetails): bool;

    /**
     * @param int $detailsId
     * @return bool
     * @throws NoSuchEntityException
     * @throws CouldNotDeleteException
     */
    public function deleteById(int $detailsId): bool;
}
