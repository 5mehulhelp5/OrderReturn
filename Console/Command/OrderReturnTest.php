<?php

namespace Skuld\OrderReturn\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Skuld\OrderReturn\Model\RmaReasonForReturnCodesRepository;

class OrderReturnTest extends Command
{
    /**
     * @var RmaReasonForReturnCodesRepository
     */
    private $rmaReasonForReturnCodesRepository;

    public function __construct(
        RmaReasonForReturnCodesRepository $rmaReasonForReturnCodesRepository,
        string $name = null
    )
    {
        parent::__construct($name);
        $this->rmaReasonForReturnCodesRepository = $rmaReasonForReturnCodesRepository;
    }

    protected function configure()
    {
        $this->setName('order-return:test')
            ->setDescription('Command to test CRUD');
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $output->writeln("entra al comando");
        $returnCodes = $this->rmaReasonForReturnCodesRepository->getById(1);
        $output->writeln(print_r($returnCodes->getData(), true));
        $output->writeln("sale del comando");
        return 0;
    }
}
