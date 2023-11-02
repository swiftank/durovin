<?php
/**
 * Webkul Software.
 *
 * @category  Webkul
 * @package   Webkul_<modulename>
 * @author    Webkul Software Private Limited
 * @copyright Copyright (c) Webkul Software Private Limited (https://webkul.com)
 * @license   https://store.webkul.com/license.html
 */
namespace Vendor\Ajax\Controller\Ajax;

use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\RequestInterface;

class Request extends Action
{
    /**
     * @var \Magento\Framework\App\Action\Contex
     */
    private $context;
    /**
     * @param \Magento\Framework\App\Action\Context $context
     */
    public function __construct(Context $context, RequestInterface $request) {
        parent::__construct($context);
        $this->context  = $context;
        $this->request = $request;
    }
    
    /**
     * @return json
     */
    public function execute()
    {
        return $this->getResponse();  
    }

    public function getResponse(){
        // $whoteData = $this->context->getRequest()->getParams();
        $objectManager =   \Magento\Framework\App\ObjectManager::getInstance();
        $connection = $objectManager->get('Magento\Framework\App\ResourceConnection')->getConnection('\Magento\Framework\App\ResourceConnection::DEFAULT_CONNECTION'); 
        $string = $this->context->getRequest()->getParams('q');
        $query = "SELECT title, identifier FROM magefan_blog_post where is_active = 1 and title LIKE '%$string[q]%' LIMIT 5 ";
        $rows = $connection->fetchAll($query);
        $rows = count($rows) == 0 ? [] : $rows;
        $resultJson = $this->resultFactory->create(ResultFactory::TYPE_JSON);
        $resultJson->setData($rows);
        return $resultJson;
    }

}