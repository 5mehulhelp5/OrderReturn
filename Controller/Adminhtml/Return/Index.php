<?php
namespace Skuld\OrderReturn\Controller\Adminhtml\Return;

use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    const ADMIN_RESOURCE = 'Skuld_OrderReturn::return';

    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    public function __construct(
        Action\Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * Execute method
     */
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Skuld_OrderReturn::return');
        $resultPage->getConfig()->getTitle()->prepend(__('Order Returns *aquí se mostrara la tabla completa de devoluciones*'));
        return $resultPage;
    }
}
