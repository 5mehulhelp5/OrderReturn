<?php

namespace Skuld\OrderReturn\Model;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Model\AbstractModel;
use Skuld\OrderReturn\Api\Data\RmaReasonForReturnCodesInterface;
use Skuld\OrderReturn\Api\Data\RmaReasonForReturnCodesSearchResultsInterface;
use Skuld\OrderReturn\Api\Data\RmaReasonForReturnCodesSearchResultsInterfaceFactory;
use Skuld\OrderReturn\Api\RmaReasonForReturnCodesRepositoryInterface;
use Skuld\OrderReturn\Model\ResourceModel\RmaReasonForReturnCodes as RmaReasonForReturnCodesResource;
use Skuld\OrderReturn\Model\RmaReasonForReturnCodesFactory;
use Skuld\OrderReturn\Model\ResourceModel\RmaReasonForReturnCodes\Collection as RmaReasonForReturnCodesCollection;
use Skuld\OrderReturn\Model\ResourceModel\RmaReasonForReturnCodes\CollectionFactory as RmaReasonForReturnCodesCollectionFactory;

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
    /**
     * @var RmaReasonForReturnCodesCollectionFactory
     */
    private $rmaReasonForReturnCodesCollectionFactory;
    /**
     * @var CollectionProcessorInterface
     */
    private $collectionProcessor;
    /**
     * @var RmaReasonForReturnCodesSearchResultsInterfaceFactory
     */
    private $rmaReasonForReturnCodesSearchResultsInterfaceFactory;

    public function __construct(
        RmaReasonForReturnCodesResource $orderReturnCodesResource,
        RmaReasonForReturnCodesFactory $rmaReasonForReturnCodesFactory,
        RmaReasonForReturnCodesCollectionFactory $rmaReasonForReturnCodesCollectionFactory,
        CollectionProcessorInterface $collectionProcessor,
        RmaReasonForReturnCodesSearchResultsInterfaceFactory $rmaReasonForReturnCodesSearchResultsInterfaceFactory
    ) {
        $this->orderReturnCodesResource = $orderReturnCodesResource;
        $this->rmaReasonForReturnCodesFactory = $rmaReasonForReturnCodesFactory;
        $this->rmaReasonForReturnCodesCollectionFactory = $rmaReasonForReturnCodesCollectionFactory;
        $this->collectionProcessor = $collectionProcessor;
        $this->rmaReasonForReturnCodesSearchResultsInterfaceFactory = $rmaReasonForReturnCodesSearchResultsInterfaceFactory;
    }

    public function save(RmaReasonForReturnCodesInterface $reasonForReturnCode): RmaReasonForReturnCodesInterface
    {
        if (!($reasonForReturnCode instanceof AbstractModel)) {
            throw new CouldNotSaveException(__('The implementation of RmaReasonForReturnCodes has changed'));
        }
        try {
            $this->orderReturnCodesResource->save($reasonForReturnCode);
        } catch (\Exception $e) {
            throw new CouldNotSaveException(__($e->getMessage()));
        }
        return $reasonForReturnCode;
    }

    public function getById(int $reasonForReturnCodeId): RmaReasonForReturnCodesInterface
    {
        $returnCode = $this->rmaReasonForReturnCodesFactory->create();
        $this->orderReturnCodesResource->load($returnCode, $reasonForReturnCodeId);
        if (!$returnCode->getId()) {
            throw new NoSuchEntityException(__('Reason for return code not found.'));
        }
        return $returnCode;
    }

    public function delete(RmaReasonForReturnCodesInterface $reasonForReturnCode): bool
    {
        if (!($reasonForReturnCode instanceof AbstractModel)) {
            throw new CouldNotSaveException(__('The implementation of RmaReasonForReturnCodes has changed'));
        }

        try {
            $this->orderReturnCodesResource->delete($reasonForReturnCode);
        } catch (\Exception $e) {
            throw new CouldNotDeleteException(__($e->getMessage()));
        }

        return true;
    }

    public function deleteById(int $reasonForReturnCodeId): bool
    {
        return $this->delete($this->getById($reasonForReturnCodeId));
    }

    public function getList(SearchCriteriaInterface $searchCriteria): RmaReasonForReturnCodesSearchResultsInterface
    {
        /** @var RmaReasonForReturnCodesCollection $collection */
        $collection = $this->rmaReasonForReturnCodesCollectionFactory->create();

        $this->collectionProcessor->process($searchCriteria, $collection);

        /** @var RmaReasonForReturnCodesSearchResultsInterface $searchResults */
        $searchResults = $this->rmaReasonForReturnCodesSearchResultsInterfaceFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }
}
