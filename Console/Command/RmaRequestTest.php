<?php

namespace Skuld\OrderReturn\Console\Command;

use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Api\SortOrderBuilder;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Skuld\OrderReturn\Model\RmaRequest;
use Skuld\OrderReturn\Model\RmaRequestFactory;
use Skuld\OrderReturn\Model\RmaRequestRepository;

class RmaRequestTest extends Command
{
    /**
     * @var RmaRequestFactory
     */
    private $rmaRequestFactory;
    /**
     * @var RmaRequestRepository
     */
    private $rmaRequestRepository;
    /**
     * @var SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;
    /**
     * @var SortOrderBuilder
     */
    private $sortOrderBuilder;

    public function __construct(
        RmaRequestFactory $rmaRequestFactory,
        RmaRequestRepository $rmaRequestRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        SortOrderBuilder $sortOrderBuilder,
        string $name = null
    ) {
        parent::__construct($name);
        $this->rmaRequestFactory = $rmaRequestFactory;
        $this->rmaRequestRepository = $rmaRequestRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->sortOrderBuilder = $sortOrderBuilder;
    }

    protected function configure()
    {
        $this->setName('order-return:request')
            ->setDescription('Command to test return request CRUD');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->getList($output);
        return 0;
    }

    protected function createNewRecord($output) {
        $output->writeln('start: '.__FUNCTION__);

        /** @var RmaRequest $request */
        $request = $this->rmaRequestFactory->create();
        $request
            ->setReturnRequestId('RRWSSV00000001')
            ->setStatus('Open c:')
            ->setIsActive(true)
            ->setSalesOrganization(3)
            ->setDistributionChannel(2)
            ->setSoldToParty(2)
            ->setCustomerCustomEmail('reyesiovanny@gmail.com')
            ->setOrderId(6)
            ->setOrderIncrementId('000000006')
            ->setReturnRequestTypeId(3);

        $this->rmaRequestRepository->save($request);
        $output->writeln('finish: '.__FUNCTION__);
    }

    protected function getElementById($output, $id) {
        $output->writeln('start: '.__FUNCTION__);
        $request = $this->rmaRequestRepository->getById($id);
        $output->writeln(print_r($request->getData(), true));
        $output->writeln('finish: '.__FUNCTION__);
    }

    protected function deleteById($output, $id) {
        $output->writeln('start: '.__FUNCTION__);
        $deleteStatus = $this->rmaRequestRepository->deleteById($id);
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
        $requestItems = $this->rmaRequestRepository->getList($this->searchCriteriaBuilder->create())->getItems();
        foreach ($requestItems as $requestItem) {
            $output->writeln(print_r($requestItem->getData(), true));
        }
        $output->writeln('finish: '.__FUNCTION__);
    }
}
