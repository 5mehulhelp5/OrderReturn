<?php

namespace Skuld\OrderReturn\Console\Command;

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

    public function __construct(
        RmaRequestItemsRepository $rmaRequestItemsRepository,
        RmaRequestItemsFactory $rmaRequestItemsFactory,
        string $name = null
    ) {
        parent::__construct($name);
        $this->rmaRequestItemsRepository = $rmaRequestItemsRepository;
        $this->rmaRequestItemsFactory = $rmaRequestItemsFactory;
    }

    protected function configure()
    {
        $this->setName('order-return:request-items')
            ->setDescription('Command to test return request items CRUD');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->deleteById($output, 2);
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
        $output->writeln('finish: '.__FUNCTION__);
    }
}
