<?php

namespace Skuld\OrderReturn\Model;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\DB\Select;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Model\AbstractModel;
use Skuld\OrderReturn\Api\Data\RmaReturnRequestTypeCodesInterface;
use Skuld\OrderReturn\Api\Data\RmaReturnRequestTypeCodesSearchResultsInterface;
use Skuld\OrderReturn\Api\Data\RmaReturnRequestTypeCodesSearchResultsInterfaceFactory;
use Skuld\OrderReturn\Api\RmaReturnRequestTypeCodesRepositoryInterface;
use Skuld\OrderReturn\Model\ResourceModel\RmaReturnRequestTypeCodes as RmaReturnRequestTypeCodesResourceModel;
use Skuld\OrderReturn\Model\RmaReturnRequestTypeCodesFactory;
use Skuld\OrderReturn\Model\ResourceModel\RmaReturnRequestTypeCodes\Collection as RmaReturnRequestTypeCodesCollection;
use Skuld\OrderReturn\Model\ResourceModel\RmaReturnRequestTypeCodes\CollectionFactory as RmaReturnRequestTypeCodesCollectionFactory;

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
    /**
     * @var RmaReturnRequestTypeCodesCollectionFactory
     */
    private $rmaReturnRequestTypeCodesCollectionFactory;
    /**
     * @var CollectionProcessorInterface
     */
    private $collectionProcessor;
    /**
     * @var RmaReturnRequestTypeCodesSearchResultsInterfaceFactory
     */
    private $rmaReturnRequestTypeCodesSearchResultsInterfaceFactory;

    public function __construct(
        RmaReturnRequestTypeCodesResourceModel $rmaReturnRequestTypeCodesResourceModel,
        RmaReturnRequestTypeCodesFactory $rmaReturnRequestTypeCodesFactory,
        RmaReturnRequestTypeCodesCollectionFactory $rmaReturnRequestTypeCodesCollectionFactory,
        CollectionProcessorInterface $collectionProcessor,
        RmaReturnRequestTypeCodesSearchResultsInterfaceFactory $rmaReturnRequestTypeCodesSearchResultsInterfaceFactory
    ) {
        $this->rmaReturnRequestTypeCodesResourceModel = $rmaReturnRequestTypeCodesResourceModel;
        $this->rmaReturnRequestTypeCodesFactory = $rmaReturnRequestTypeCodesFactory;
        $this->rmaReturnRequestTypeCodesCollectionFactory = $rmaReturnRequestTypeCodesCollectionFactory;
        $this->collectionProcessor = $collectionProcessor;
        $this->rmaReturnRequestTypeCodesSearchResultsInterfaceFactory = $rmaReturnRequestTypeCodesSearchResultsInterfaceFactory;
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
       return $rmaReturnRequestTypeCode;
    }

    /**
     * {@inheritdoc}
     */
    public function getById(int $returnRequestTypeCodeId): RmaReturnRequestTypeCodesInterface
    {
        $returnRequestTypeCode = $this->rmaReturnRequestTypeCodesFactory->create();
        $this->rmaReturnRequestTypeCodesResourceModel->load($returnRequestTypeCode, $returnRequestTypeCodeId);
        if (!$returnRequestTypeCode->getId() || $returnRequestTypeCode->getIsDeleted()) {
            throw new NoSuchEntityException(__('Request type code not found.'));
        }
        return $returnRequestTypeCode;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(RmaReturnRequestTypeCodesInterface $rmaReturnRequestTypeCode): bool
    {
        if (!($rmaReturnRequestTypeCode instanceof AbstractModel)) {
            throw new CouldNotDeleteException(__('The implementation of ReturnRequestTypeCode has changed'));
        }

        try {
            $this->rmaReturnRequestTypeCodesResourceModel->delete($rmaReturnRequestTypeCode);
        } catch (\Exception $e) {
            throw new CouldNotDeleteException(__($e->getMessage()));
        }

        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById(int $returnRequestTypeCodeId): bool
    {
        return $this->delete($this->getById($returnRequestTypeCodeId));
    }

    /**
     * {@inheritdoc}
     */
    public function getList(SearchCriteriaInterface $searchCriteria, ?bool $includeDeleted = false): RmaReturnRequestTypeCodesSearchResultsInterface
    {
        /** @var RmaReturnRequestTypeCodesCollection $collection */
        $collection = $this->rmaReturnRequestTypeCodesCollectionFactory->create();
        if ($includeDeleted) {
            $collection->getSelect()->reset(Select::WHERE);
        }

        $this->collectionProcessor->process($searchCriteria, $collection);

        /** @var RmaReturnRequestTypeCodesSearchResultsInterface $searchResults */
        $searchResults = $this->rmaReturnRequestTypeCodesSearchResultsInterfaceFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function softDelete(RmaReturnRequestTypeCodesInterface $rmaReturnRequestTypeCode): bool
    {
        if (!($rmaReturnRequestTypeCode instanceof AbstractModel)) {
            throw new CouldNotDeleteException(__('The implementation of ReturnRequestTypeCode has changed'));
        }
        try {
            $time = (new \DateTime())->setTimezone(new \DateTimeZone('UTC'));
            $rmaReturnRequestTypeCode->setDeletedAt($time);
            $this->rmaReturnRequestTypeCodesResourceModel->save($rmaReturnRequestTypeCode);
        } catch (\Exception $e) {
            throw new CouldNotDeleteException(__($e->getMessage()));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function softDeleteById(int $returnRequestTypeCodeId): bool
    {
        return $this->softDelete($this->getById($returnRequestTypeCodeId));
    }

    /**
     * {@inheritdoc}
     */
    public function restore(RmaReturnRequestTypeCodesInterface $rmaReturnRequestTypeCode): bool
    {
        if (!($rmaReturnRequestTypeCode instanceof AbstractModel)) {
            throw new CouldNotSaveException(__('The implementation of ReturnRequestTypeCode has changed'));
        }
        try {
            $rmaReturnRequestTypeCode->setDeletedAt(null);
            $this->rmaReturnRequestTypeCodesResourceModel->save($rmaReturnRequestTypeCode);
        } catch (\Exception $e) {
            throw new CouldNotSaveException(__($e->getMessage()));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function restoreById(int $returnRequestTypeCodeId): bool
    {
        return $this->restore($this->getById($returnRequestTypeCodeId));
    }

    /**
     * {@inheritdoc}
     */
    public function getListWithDeleted(SearchCriteriaInterface $searchCriteria): RmaReturnRequestTypeCodesSearchResultsInterface
    {
        return $this->getList($searchCriteria, true);
    }
}
