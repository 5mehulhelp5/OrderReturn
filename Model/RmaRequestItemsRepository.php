<?php

namespace Skuld\OrderReturn\Model;

use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Model\AbstractModel;
use Skuld\OrderReturn\Api\Data\RmaRequestItemsInterface;
use Skuld\OrderReturn\Api\RmaRequestItemsRepositoryInterface;
use Skuld\OrderReturn\Model\ResourceModel\RmaRequestItems as RmaRequestItemsResource;
use Skuld\OrderReturn\Model\RmaRequestItemsFactory;

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

    public function __construct(
        RmaRequestItemsResource $rmaRequestItemsResource,
        RmaRequestItemsFactory $rmaRequestItemsFactory
    ) {
        $this->rmaRequestItemsResource = $rmaRequestItemsResource;
        $this->rmaRequestItemsFactory = $rmaRequestItemsFactory;
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
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById(int $requestItemId): bool
    {
        return $this->delete($this->getById($requestItemId));
    }
}
