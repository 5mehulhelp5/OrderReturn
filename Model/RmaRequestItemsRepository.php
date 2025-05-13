<?php

namespace Skuld\OrderReturn\Model;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Model\AbstractModel;
use Skuld\OrderReturn\Api\Data\RmaRequestItemsInterface;
use Skuld\OrderReturn\Api\Data\RmaRequestItemsSearchResultsInterface;
use Skuld\OrderReturn\Api\Data\RmaRequestItemsSearchResultsInterfaceFactory;
use Skuld\OrderReturn\Api\RmaRequestItemsRepositoryInterface;
use Skuld\OrderReturn\Model\ResourceModel\RmaRequestItems as RmaRequestItemsResource;
use Skuld\OrderReturn\Model\RmaRequestItemsFactory;
use Skuld\OrderReturn\Model\ResourceModel\RmaRequestItems\Collection as RmaRequestItemsCollection;
use Skuld\OrderReturn\Model\ResourceModel\RmaRequestItems\CollectionFactory as RmaRequestItemsCollectionFactory;

class RmaRequestItemsRepository implements RmaRequestItemsRepositoryInterface
{
    /**
     * @var RmaRequestItemsResource
     */
    private $rmaRequestItemsResource;
    /**
     * @var \Skuld\OrderReturn\Model\RmaRequestItemsFactory
     */
    private $rmaRequestItemsFactory;
    /**
     * @var RmaRequestItemsCollectionFactory
     */
    private $rmaRequestItemsCollectionFactory;
    /**
     * @var CollectionProcessorInterface
     */
    private $collectionProcessor;
    /**
     * @var RmaRequestItemsSearchResultsInterfaceFactory
     */
    private $rmaRequestItemsSearchResultsInterfaceFactory;

    public function __construct(
        RmaRequestItemsResource $rmaRequestItemsResource,
        RmaRequestItemsFactory $rmaRequestItemsFactory,
        RmaRequestItemsCollectionFactory $rmaRequestItemsCollectionFactory,
        CollectionProcessorInterface $collectionProcessor,
        RmaRequestItemsSearchResultsInterfaceFactory $rmaRequestItemsSearchResultsInterfaceFactory
    ) {
        $this->rmaRequestItemsResource = $rmaRequestItemsResource;
        $this->rmaRequestItemsFactory = $rmaRequestItemsFactory;
        $this->rmaRequestItemsCollectionFactory = $rmaRequestItemsCollectionFactory;
        $this->collectionProcessor = $collectionProcessor;
        $this->rmaRequestItemsSearchResultsInterfaceFactory = $rmaRequestItemsSearchResultsInterfaceFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function save(RmaRequestItemsInterface $requestItem): RmaRequestItemsInterface
    {
        if (!($requestItem instanceof AbstractModel)) {
            throw new CouldNotSaveException(__('The implementation of RmaRequestItems has changed'));
        }
        try {
            $this->rmaRequestItemsResource->save($requestItem);
        } catch (\Exception $e) {
            throw new CouldNotSaveException(__($e->getMessage()));
        }
        return $requestItem;
    }

    /**
     * {@inheritdoc}
     */
    public function getById(int $requestItemId): RmaRequestItemsInterface
    {
        $requestItem = $this->rmaRequestItemsFactory->create();
        $this->rmaRequestItemsResource->load($requestItem, $requestItemId);
        if (!$requestItem->getId()) {
            throw new NoSuchEntityException(__('Request item id not found'));
        }
        return $requestItem;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(RmaRequestItemsInterface $requestItem): bool
    {
        if (!($requestItem instanceof AbstractModel)) {
            throw new CouldNotDeleteException(__('The implementation of RmaRequestItems has changed'));
        }
        try {
            $this->rmaRequestItemsResource->delete($requestItem);
        } catch (\Exception $e) {
            throw new CouldNotDeleteException(__($e->getMessage()));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById(int $requestItemId): bool
    {
        return $this->delete($this->getById($requestItemId));
    }

    /**
     * {@inheritdoc}
     */
    public function getList(SearchCriteriaInterface $searchCriteria): RmaRequestItemsSearchResultsInterface
    {
        /** @var RmaRequestItemsCollection $collection */
        $collection = $this->rmaRequestItemsCollectionFactory->create();

        $this->collectionProcessor->process($searchCriteria, $collection);

        /** @var RmaRequestItemsSearchResultsInterface $searchResults */
        $searchResults = $this->rmaRequestItemsSearchResultsInterfaceFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }
}
