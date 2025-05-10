<?php

namespace Skuld\OrderReturn\Console\Command;

use Skuld\OrderReturn\Model\RmaReturnRequestTypeCodesRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RmaReturnRequestTypeCodesTest extends Command
{
    /**
     * @var RmaReturnRequestTypeCodesRepository
     */
    private $repository;

    public function __construct(
        RmaReturnRequestTypeCodesRepository $repository,
        string $name = null
    ) {
        parent::__construct($name);
        $this->repository = $repository;
    }

    protected function configure()
    {
        $this->setName('order-return:type-codes')
            ->setDescription('Command to test CRUD');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->getElementById($output, 1);
        return 0;
    }

    protected function getElementById($output, $id) {
        $output->writeln("entra a la función de búsqueda");
        $typeCodes = $this->repository->getById($id);
        $output->writeln(print_r($typeCodes->getData(), true));
        $output->writeln("sale de la función de búsqueda");
    }
}
