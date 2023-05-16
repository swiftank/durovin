<?php 

 namespace Vendor\Ajax\Controller\Index;

use \Magento\Framework\App\Action\HttpGetActionInterface;
use \Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Controller\ResultFactory;


// \Magento\Framework\View\Result\Page – actually renders html
// \Magento\Framework\Controller\Result\Redirect – redirects to an other page
// \Magento\Framework\Controller\Result\Forward – forwards to an other action (internal redirect)
// \Magento\Framework\Controller\Result\Json – returns a json object.
// \Magento\Framework\Controller\Result\Raw – returns whatever you tell it to return (string).

class Index implements HttpGetActionInterface 
{
     /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    /**
     * @param PageFactory $resultPageFactory
     */
    public function __construct(PageFactory $resultPageFactory) {
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * Prints the information 
     * @return Page
     */
    public function execute()
    {
        return $this->resultPageFactory->create();
    }

    public function index(){
        echo 'dfd'; exit;
    }

}