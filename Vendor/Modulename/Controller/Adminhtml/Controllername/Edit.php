<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Vendor\Modulename\Controller\Adminhtml\Controllername;

use Magento\Backend\App\Action;
use Magento\Framework\Controller\ResultFactory;

class Edit extends \Magento\Backend\App\Action
{
    /**
         * Authorization level of a basic admin session
         *
         * @see _isAllowed()
         */
        const ADMIN_RESOURCE = 'Vendor_Modulename::entity';

        /**
         * @var \Magento\Framework\Registry
         */
        private $coreRegistry;
    
        /**
         * @var \Vendor\Modulename\Model\EntityFactory
         */
        private $entityFactory;
    
        /**
         * @param \Magento\Backend\App\Action\Context $context
         * @param \Magento\Framework\Registry $coreRegistry,
         * @param \Vendor\Modulename\Model\EntityFactory $entityFactory
         */
        public function __construct(
            \Magento\Backend\App\Action\Context $context,
            \Magento\Framework\Registry $coreRegistry,
            \Vendor\Modulename\Model\EntityFactory $entityFactory
        ) {
            parent::__construct($context);
            $this->coreRegistry = $coreRegistry;
            $this->entityFactory = $entityFactory; 
        }
    
       
        public function execute()
        {
            $rowId = (int) $this->getRequest()->getParam('st_id');
            $rowData = $this->entityFactory->create();
            
            
            if ($rowId) {
                $rowData = $rowData->load($rowId);
            
                if (!$rowData->getEntityId()) {
                    $this->messageManager->addError(__('row data no longer exist.'));
                    $this->_redirect('*/*/index');
                    return;
                }
            }
    
            $this->coreRegistry->register('row_data', $rowData);
            $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
            $resultPage->setActiveMenu('Vendor_Modulename::first_level_menu');
            $title = "Entity Information";
            $resultPage->getConfig()->getTitle()->prepend($title);
            return $resultPage;
        }
    
      
    }