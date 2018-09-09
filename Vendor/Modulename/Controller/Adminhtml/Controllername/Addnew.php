<?php
/** 
 * @package   Vendor_Modulename
 * @author    Ricky Thakur (Kapil Dev Singh)
 * @copyright Copyright (c) 2018 Ricky Thakur
 * @license   MIT license (see LICENSE.txt for details)
 */
namespace Vendor\Modulename\Controller\Adminhtml\Controllername;

use Magento\Backend\App\Action\Context;
use Vendor\Modulename\Model\EntityFactory;
use Magento\Framework\Controller\ResultFactory;
    
class Addnew extends \Magento\Backend\App\Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Vendor_Modulename::entity';

    
    /**
     * @var \Vendor\Modulename\Model\EntityFactory
     */
    private $entityFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Vendor\Modulename\Model\EntityFactory $entityFactory
     */
    public function __construct(
        Context $context,
        EntityFactory $entityFactory
    ) {
        parent::__construct($context);
        $this->entityFactory = $entityFactory;            
    }
    

    /**
     * Create new Entity
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {   
        
        $this->entityFactory->create();
        
        
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->setActiveMenu('Vendor_Modulename::first_level_menu');
        
        $title = "Entity Information";
        
        $resultPage->getConfig()->getTitle()->prepend($title);
        
        return $resultPage;
    }
}  