<?php

namespace ArtM\BulkOrder\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Context;
class Index extends Action
{
    protected $ResultFactory;
      
    public function __construct(
        Context $context,
        PageFactory $PageFactory
    )
    {
        $this->PageFactory = $PageFactory;
        parent::__construct($context);
    }

    public function execute()
    {        
        $page = $this->PageFactory->create();
        
        $page->getConfig()->getTitle()->set((__('Request Bulk Purchase')));
        $page->getConfig()->setDescription("Looking to purchase golf gear in bulk? Submit a request for a quote on Golfoy.com. We offer a wide selection of wholesale golf products at the best prices.");
        $page->getConfig()->setKeywords("Request Bulk Purchase, Bulk order requests");
        
        $page->getConfig()->addRemotePageAsset(
            "https://mage.golfoy.com/request_bulk_purchase",
            'canonical',
            ['attributes' => ['rel' => 'canonical']]
        );


        $formdata = $this->getRequest()->getParams();
        
        $block = $page->getLayout()->getBlock('bulk_order');
        
        $block->setData('formdata', $formdata); 

        return $page;
    }
}
