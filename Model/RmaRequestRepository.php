<?php

namespace Skuld\OrderReturn\Model;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Model\AbstractModel;
use Skuld\OrderReturn\Api\Data\RmaRequestInterface;
use Skuld\OrderReturn\Api\Data\RmaRequestSearchResultsInterface;
use Skuld\OrderReturn\Api\Data\RmaRequestSearchResultsInterfaceFactory;
use Skuld\OrderReturn\Api\RmaRequestRepositoryInterface;
use Skuld\OrderReturn\Model\ResourceModel\RmaRequest as RmaRequestResourceModel;
use Skuld\OrderReturn\Model\RmaRequest;
use Skuld\OrderReturn\Model\RmaRequestFactory;
use Skuld\OrderReturn\Model\ResourceModel\RmaRequest\Collection as RmaRequestCollection;
use Skuld\OrderReturn\Model\ResourceModel\RmaRequest\CollectionFactory as RmaRequestCollectionFactory;

class RmaRequestRepository implements RmaRequestRepositoryInterface
{
    /**
     * @var RmaRequestResourceModel
     */
    private $requestResourceModel;
    /**
     * @var \Skuld\OrderReturn\Model\RmaRequestFactory
     */
    private $rmaRequestFactory;
    /**
     * @var RmaRequestCollectionFactory
     */
    private $rmaRequestCollectionFactory;
    /**
     * @var CollectionProcessorInterface
     */
    private $collectionProcessor;
    /**
     * @var RmaRequestSearchResultsInterfaceFactory
     */
    private $rmaRequestSearchResultsInterfaceFactory;

    public function __construct(
        RmaRequestResourceModel $requestResourceModel,
        RmaRequestFactory $rmaRequestFactory,
        RmaRequestCollectionFactory $rmaRequestCollectionFactory,
        CollectionProcessorInterface $collectionProcessor,
        RmaRequestSearchResultsInterfaceFactory $rmaRequestSearchResultsInterfaceFactory
    ) {
        $this->requestResourceModel = $requestResourceModel;
        $this->rmaRequestFactory = $rmaRequestFactory;
        $this->rmaRequestCollectionFactory = $rmaRequestCollectionFactory;
        $this->collectionProcessor = $collectionProcessor;
        $this->rmaRequestSearchResultsInterfaceFactory = $rmaRequestSearchResultsInterfaceFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function save(RmaRequestInterface $request): RmaRequestInterface
    {
        if (!($request instanceof AbstractModel)) {
            throw new CouldNotSaveException(__('The implementation of RmaRequest has changed'));
        }
        try {
            $this->requestResourceModel->save($request);
        } catch (\Exception $e) {
            throw new CouldNotSaveException(__($e->getMessage()));
        }
        return $request;
    }

    /**
     * {@inheritdoc}
     */
    public function getById(int $requestId): RmaRequestInterface
    {
        /** @var RmaRequest $request */
        $request = $this->rmaRequestFactory->create();
        $this->requestResourceModel->load($request, $requestId);
        if (!$request->getId()) {
            throw new NoSuchEntityException(__('Request id not found'));
        }
        return $request;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(RmaRequestInterface $request): bool
    {
        if (!($request instanceof AbstractModel)) {
            throw new CouldNotDeleteException(__('The implementation of RmaRequest has changed'));
        }
        try {
            $this->requestResourceModel->delete($request);
        } catch (\Exception $e) {
            throw new CouldNotDeleteException(__($e->getMessage()));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById(int $requestId): bool
    {
        return $this->delete($this->getById($requestId));
    }

    /**
     * {@inheritdoc}
     */
    public function softDelete(RmaRequestInterface $request): bool
    {
        if (!($request instanceof AbstractModel)) {
            throw new CouldNotDeleteException(__('The implementation of RmaRequest has changed'));
        }
        try {
            $time = (new \DateTime())->setTimezone(new \DateTimeZone('UTC'));
            $request->setDeletedAt($time);
            $this->requestResourceModel->save($request);
        } catch (\Exception $e) {
            throw new CouldNotDeleteException(__($e->getMessage()));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function softDeleteById(int $requestId): bool
    {
        return $this->softDelete($this->getById($requestId));
    }

    /**
     * {@inheritdoc}
     */
    public function getList(SearchCriteriaInterface $searchCriteria): RmaRequestSearchResultsInterface
    {
        /** @var RmaRequestCollection $collection */
        $collection = $this->rmaRequestCollectionFactory->create();

        $this->collectionProcessor->process($searchCriteria, $collection);

        $searchResults = $this->rmaRequestSearchResultsInterfaceFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }
}
