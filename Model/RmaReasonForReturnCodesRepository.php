<?php

namespace Skuld\OrderReturn\Model;

use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Model\AbstractModel;
use Skuld\OrderReturn\Api\Data\RmaReasonForReturnCodesInterface;
use Skuld\OrderReturn\Api\RmaReasonForReturnCodesRepositoryInterface;
use Skuld\OrderReturn\Model\ResourceModel\RmaReasonForReturnCodes as RmaReasonForReturnCodesResource;
use Skuld\OrderReturn\Model\RmaReasonForReturnCodesFactory;

class RmaReasonForReturnCodesRepository implements RmaReasonForReturnCodesRepositoryInterface
{
    /**
     * @var RmaReasonForReturnCodesResource
     */
    private $orderReturnCodesResource;
    /**
     * @var \Skuld\OrderReturn\Model\RmaReasonForReturnCodesFactory
     */
    private $rmaReasonForReturnCodesFactory;

    public function __construct(
        RmaReasonForReturnCodesResource $orderReturnCodesResource,
        RmaReasonForReturnCodesFactory $rmaReasonForReturnCodesFactory
    ) {
        $this->orderReturnCodesResource = $orderReturnCodesResource;
        $this->rmaReasonForReturnCodesFactory = $rmaReasonForReturnCodesFactory;
    }

    public function save(RmaReasonForReturnCodesInterface $orderReturnDetails): RmaReasonForReturnCodesInterface
    {
        if (!($orderReturnDetails instanceof AbstractModel)) {
            throw new CouldNotSaveException(__('The implementation of OrderExportDetails has changed'));
        }
        try {
            $this->orderReturnCodesResource->save($orderReturnDetails);
        } catch (\Exception $e) {
            throw new CouldNotSaveException(__($e->getMessage()));
        }
        return $orderReturnDetails;
    }

    public function getById(int $detailsId): RmaReasonForReturnCodesInterface
    {
        $returnCode = $this->rmaReasonForReturnCodesFactory->create();
        $this->orderReturnCodesResource->load($returnCode, $detailsId);
        if (!$returnCode->getId()) {
            throw new NoSuchEntityException(__('Order export details not found.'));
        }
        return $returnCode;
    }

    public function delete(RmaReasonForReturnCodesInterface $exportDetails): bool
    {
        if (!($exportDetails instanceof AbstractModel)) {
            throw new CouldNotSaveException(__('The implementation of OrderExportDetails has changed'));
        }

        try {
            $this->orderReturnCodesResource->delete($exportDetails);
        } catch (\Exception $e) {
            throw new CouldNotDeleteException(__($e->getMessage()));
        }

        return true;
    }

    public function deleteById(int $detailsId): bool
    {
        return $this->delete($this->getById($detailsId));
    }
}
