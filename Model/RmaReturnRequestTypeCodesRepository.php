<?php

namespace Skuld\OrderReturn\Model;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
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
        if (!($rmaReturnRequestTypeCode instanceof AbstractModel)) {
            throw new CouldNotSaveException(__('The implementation of ReturnRequestTypeCode has changed'));
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
    public function getList(SearchCriteriaInterface $searchCriteria): RmaReturnRequestTypeCodesSearchResultsInterface
    {
        /** @var RmaReturnRequestTypeCodesCollection $collection */
        $collection = $this->rmaReturnRequestTypeCodesCollectionFactory->create();

        $this->collectionProcessor->process($searchCriteria, $collection);

        /** @var RmaReturnRequestTypeCodesSearchResultsInterface $searchResults */
        $searchResults = $this->rmaReturnRequestTypeCodesSearchResultsInterfaceFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }
}
