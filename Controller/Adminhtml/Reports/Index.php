<?php
namespace Skuld\OrderReturn\Controller\Adminhtml\Reports;

use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    const ADMIN_RESOURCE = 'Skuld_OrderReturn::reports';

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
        $resultPage->setActiveMenu('Skuld_OrderReturn::reports');
        $resultPage->getConfig()->getTitle()->prepend(__('Order Returns *aquí se mostrara un menú de exportación de reportes*'));
        return $resultPage;
    }
}
