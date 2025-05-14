<?php

namespace Skuld\OrderReturn\Console\Command;

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

    public function __construct(
        RmaReturnRequestTypeCodesRepository $returnRequestTypeCodesRepository,
        RmaReturnRequestTypeCodesFactory    $rmaReturnRequestTypeCodesFactory,
        string                              $name = null
    ) {
        parent::__construct($name);
        $this->returnRequestTypeCodesRepository = $returnRequestTypeCodesRepository;
        $this->rmaReturnRequestTypeCodesFactory = $rmaReturnRequestTypeCodesFactory;
    }

    protected function configure()
    {
        $this->setName('order-return:type-codes')
            ->setDescription('Command to test return request type codes CRUD');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->deleteById($output, 29);
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
        $output->writeln('finish: '.__FUNCTION__);
    }
}
