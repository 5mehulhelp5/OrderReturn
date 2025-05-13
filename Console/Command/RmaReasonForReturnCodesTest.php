<?php

namespace Skuld\OrderReturn\Console\Command;

use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Api\SortOrderBuilder;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Skuld\OrderReturn\Model\RmaReasonForReturnCodesRepository;
use Skuld\OrderReturn\Api\Data\RmaReasonForReturnCodesInterface;
use Skuld\OrderReturn\Api\Data\RmaReasonForReturnCodesInterfaceFactory;

class RmaReasonForReturnCodesTest extends Command
{
    /**
     * @var RmaReasonForReturnCodesRepository
     */
    private $rmaReasonForReturnCodesRepository;
    /**
     * @var RmaReasonForReturnCodesFactory
     */
    private $rmaReasonForReturnCodesFactory;
    /**
     * @var SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;
    /**
     * @var SortOrderBuilder
     */
    private $sortOrderBuilder;

    public function __construct(
        RmaReasonForReturnCodesRepository $rmaReasonForReturnCodesRepository,
        RmaReasonForReturnCodesInterfaceFactory $rmaReasonForReturnCodesFactory,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        SortOrderBuilder $sortOrderBuilder,
        string $name = null
    )
    {
        parent::__construct($name);
        $this->rmaReasonForReturnCodesRepository = $rmaReasonForReturnCodesRepository;
        $this->rmaReasonForReturnCodesFactory = $rmaReasonForReturnCodesFactory;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->sortOrderBuilder = $sortOrderBuilder;
    }

    protected function configure()
    {
        $this->setName('order-return:return-codes')
            ->setDescription('Command to test reason for return codes CRUD');
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $this->getList($output, 3);
        return 0;
    }

    protected function getElementById($output, $id) {
        $output->writeln("entra a la función de búsqueda");
        $returnCodes = $this->rmaReasonForReturnCodesRepository->getById($id);
        $output->writeln(print_r($returnCodes->getData(), true));
        $output->writeln("sale de la función de búsqueda");
    }

    protected function createNewRecord($output) {
        $output->writeln("entra a la función de guardado");
        /** @var RmaReasonForReturnCodesInterface $rmaReasonForReturnCodes */
        $rmaReasonForReturnCodes = $this->rmaReasonForReturnCodesFactory->create();
        $rmaReasonForReturnCodes->setCode('test');
        $rmaReasonForReturnCodes->setDescription('estado de prueba de inserción');
        $this->rmaReasonForReturnCodesRepository->save($rmaReasonForReturnCodes);
        $output->writeln("entra a la función de guardado");
    }

    protected function deleteById($output, $id) {
        $output->writeln("entra a la función de eliminación");
        $returnCodes = $this->rmaReasonForReturnCodesRepository->deleteById($id);
        $output->writeln($returnCodes);
        $output->writeln("entra a la función de eliminación");
    }

    protected function getList($output, $id) {
//        $this->searchCriteriaBuilder->addFilter('id', $id);
        $sortOrder = $this->sortOrderBuilder
            ->setField('id')
            ->setDirection(SortOrder::SORT_ASC)
            ->create();
        $this->searchCriteriaBuilder
            ->addSortOrder($sortOrder)
            ->setCurrentPage(1)
            ->setPageSize(30);
        $rmaReasonCodes = $this->rmaReasonForReturnCodesRepository->getList($this->searchCriteriaBuilder->create())->getItems();
        foreach ($rmaReasonCodes as $rmaReasonCode) {
            $output->writeln(print_r($rmaReasonCode->getData(), true));
        }
    }
}
