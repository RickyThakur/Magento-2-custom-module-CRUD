<?php
/** 
 * @package   Vendor_Modulename
 * @author    Ricky Thakur (Kapil Dev Singh)
 * @copyright Copyright (c) 2018 Ricky Thakur
 * @license   MIT license (see LICENSE.txt for details)
 */
namespace Vendor\Modulename\Model;

use Vendor\Modulename\Api\Data\EntityInterface;

class Entity extends \Magento\Framework\Model\AbstractModel implements EntityInterface
{
    /**
     * CMS page cache tag.
     */
    const CACHE_TAG = 'modulename_records';

    /**
     * @var string
     */
    protected $_cacheTag = 'modulename_records';

    /**
     * Prefix of model events names.
     *
     * @var string
     */
    protected $_eventPrefix = 'modulename_records';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('Vendor\Modulename\Model\ResourceModel\Entity');
    }
    /**
     * Get EntityId.
     *
     * @return int
     */
    public function getEntityId()
    {
        return $this->getData(self::ENTITY_ID);
    }

    /**
     * Set EntityId.
     */
    public function setEntityId($entityId)
    {
        return $this->setData(self::ENTITY_ID, $entityId);
    }

    /**
     * Get Message.
     *
     * @return varchar
     */
    public function getMessage()
    {
        return $this->getData(self::MESSAGE);
    }

    /**
     * Set Message.
     */
    public function setMessage($title)
    {
        return $this->setData(self::MESSAGE, $message);
    }
}
