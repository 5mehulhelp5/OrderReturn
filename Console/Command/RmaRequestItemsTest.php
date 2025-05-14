<?php

namespace Skuld\OrderReturn\Console\Command;

use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Api\SortOrderBuilder;
use Skuld\OrderReturn\Model\RmaRequestItemsRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Skuld\OrderReturn\Model\RmaRequestItems;
use Skuld\OrderReturn\Model\RmaRequestItemsFactory;

class RmaRequestItemsTest extends Command
{
    /**
     * @var RmaRequestItemsRepository
     */
    private $rmaRequestItemsRepository;
    /**
     * @var RmaRequestItemsFactory
     */
    private $rmaRequestItemsFactory;
    /**
     * @var SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;
    /**
     * @var SortOrderBuilder
     */
    private $sortOrderBuilder;

    public function __construct(
        RmaRequestItemsRepository   $rmaRequestItemsRepository,
        RmaRequestItemsFactory      $rmaRequestItemsFactory,
        SearchCriteriaBuilder       $searchCriteriaBuilder,
        SortOrderBuilder            $sortOrderBuilder,
        string $name = null
    ) {
        parent::__construct($name);
        $this->rmaRequestItemsRepository = $rmaRequestItemsRepository;
        $this->rmaRequestItemsFactory = $rmaRequestItemsFactory;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->sortOrderBuilder = $sortOrderBuilder;
    }

    protected function configure()
    {
        $this->setName('order-return:request-items')
            ->setDescription('Command to test return request items CRUD');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->getList($output);
        return 0;
    }

    protected function getElementById($output, $id) {
        $output->writeln('start: '.__FUNCTION__);
        $requestItem = $this->rmaRequestItemsRepository->getById($id);
        $output->writeln(print_r($requestItem->getData(), true));
        $output->writeln('finish: '.__FUNCTION__);
    }


    protected function createNewRecord($output) {
        $output->writeln('start: '.__FUNCTION__);
        /** @var RmaRequestItems $requestItems */
        $requestItems = $this->rmaRequestItemsFactory->create();
        $requestItems
            ->setRmaRequestId(1)
            ->setReturnRequestItemId(1)
            ->setProductName('creado desde comando')
            ->setMaterial('Stanley')
            ->setBaseUnit('pz')
            ->setQtyRequested(2)
            ->setQtyAuthorized(2)
            ->setQtyApproved(2)
            ->setQtyReturned(2)
            ->setProductAdminName('creado desde comando')
            ->setProductAdminSku('TYU77790')
            ->setReasonForReturnId(5);
        $this->rmaRequestItemsRepository->save($requestItems);
        $output->writeln('finish: '.__FUNCTION__);
    }

    protected function deleteById($output, $id) {
        $output->writeln('start: '.__FUNCTION__);
        $deleteStatus = $this->rmaRequestItemsRepository->deleteById($id);
        $output->writeln($deleteStatus);
        $output->writeln('finish: '.__FUNCTION__);
    }

    protected function getList($output) {
        $output->writeln('start: '.__FUNCTION__);
        $sortOrder = $this->sortOrderBuilder
            ->setField('id')
            ->setDirection(SortOrder::SORT_ASC)
            ->create();
        $this->searchCriteriaBuilder
            ->addSortOrder($sortOrder)
            ->setCurrentPage(1)
            ->setPageSize(30);
        $requestItems = $this->rmaRequestItemsRepository->getList($this->searchCriteriaBuilder->create())->getItems();
        foreach ($requestItems as $requestItem) {
            $output->writeln(print_r($requestItem->getData(), true));
        }
        $output->writeln('finish: '.__FUNCTION__);
    }
}
