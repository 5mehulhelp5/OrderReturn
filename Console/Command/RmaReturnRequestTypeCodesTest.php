<?php

namespace Skuld\OrderReturn\Console\Command;

use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Api\SortOrderBuilder;
use Skuld\OrderReturn\Model\RmaReturnRequestTypeCodesRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Skuld\OrderReturn\Model\RmaReturnRequestTypeCodes;
use Skuld\OrderReturn\Model\RmaReturnRequestTypeCodesFactory;

class RmaReturnRequestTypeCodesTest extends Command
{
    /**
     * @var RmaReturnRequestTypeCodesRepository
     */
    private $returnRequestTypeCodesRepository;
    /**
     * @var RmaReturnRequestTypeCodesFactory
     */
    private $rmaReturnRequestTypeCodesFactory;
    /**
     * @var SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;
    /**
     * @var SortOrderBuilder
     */
    private $sortOrderBuilder;

    public function __construct(
        RmaReturnRequestTypeCodesRepository $returnRequestTypeCodesRepository,
        RmaReturnRequestTypeCodesFactory    $rmaReturnRequestTypeCodesFactory,
        SearchCriteriaBuilder               $searchCriteriaBuilder,
        SortOrderBuilder                    $sortOrderBuilder,
        string                              $name = null
    ) {
        parent::__construct($name);
        $this->returnRequestTypeCodesRepository = $returnRequestTypeCodesRepository;
        $this->rmaReturnRequestTypeCodesFactory = $rmaReturnRequestTypeCodesFactory;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->sortOrderBuilder = $sortOrderBuilder;
    }

    protected function configure()
    {
        $this->setName('order-return:type-codes')
            ->setDescription('Command to test return request type codes CRUD');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->getList($output);
        return 0;
    }

    protected function getElementById($output, $id) {
        $output->writeln('start: '.__FUNCTION__);
        $typeCodes = $this->returnRequestTypeCodesRepository->getById($id);
        $output->writeln(print_r($typeCodes->getData(), true));
        $output->writeln('finish: '.__FUNCTION__);
    }

    protected function createNewRecord($output) {
        $output->writeln('start: '.__FUNCTION__);
        /** @var RmaReturnRequestTypeCodes $returnRequestTypeCodes */
        $returnRequestTypeCodes = $this->rmaReturnRequestTypeCodesFactory->create();
        $returnRequestTypeCodes->setCode('Test');
        $returnRequestTypeCodes->setDescription('Test return request type codes');
        $this->returnRequestTypeCodesRepository->save($returnRequestTypeCodes);
        $output->writeln('finish: '.__FUNCTION__);
    }

    protected function deleteById($output, $id) {
        $output->writeln('start: '.__FUNCTION__);
        $deleteStatus = $this->returnRequestTypeCodesRepository->deleteById($id);
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
        $returnRequestTypeCodes = $this->returnRequestTypeCodesRepository->getList($this->searchCriteriaBuilder->create())->getItems();
        foreach ($returnRequestTypeCodes as $returnRequestTypeCode) {
            $output->writeln(print_r($returnRequestTypeCode->getData(), true));
        }
        $output->writeln('finish: '.__FUNCTION__);
    }
}
