<?php

namespace Skuld\OrderReturn\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Skuld\OrderReturn\Model\RmaReasonForReturnCodesRepository;
use Skuld\OrderReturn\Api\Data\RmaReasonForReturnCodesInterface;
use Skuld\OrderReturn\Api\Data\RmaReasonForReturnCodesInterfaceFactory;

class OrderReturnTest extends Command
{
    /**
     * @var RmaReasonForReturnCodesRepository
     */
    private $rmaReasonForReturnCodesRepository;
    /**
     * @var RmaReasonForReturnCodesFactory
     */
    private $rmaReasonForReturnCodesFactory;

    public function __construct(
        RmaReasonForReturnCodesRepository $rmaReasonForReturnCodesRepository,
        RmaReasonForReturnCodesInterfaceFactory $rmaReasonForReturnCodesFactory,
        string $name = null
    )
    {
        parent::__construct($name);
        $this->rmaReasonForReturnCodesRepository = $rmaReasonForReturnCodesRepository;
        $this->rmaReasonForReturnCodesFactory = $rmaReasonForReturnCodesFactory;
    }

    protected function configure()
    {
        $this->setName('order-return:test')
            ->setDescription('Command to test CRUD');
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $this->getElementById($output, 1);
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
        /** @var RmaReasonForReturnCodesInterface $exportDetails */
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
}
