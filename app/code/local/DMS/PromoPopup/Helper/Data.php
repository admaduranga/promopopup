<?php
/**
 * Magento 1.9 Community - Promo Popup
 * @category    DMS
 * @package     DMS_PromoPopup
 * @date        2018-02-12
 * @author      A. Dilhan Maduranga <admaduranga@gmail.com>
 */

class DMS_PromoPopup_Helper_Data extends Mage_Core_Helper_Abstract
{
    /**
     * Class Constants
     */
    const CONST_NAME_PROMO_COOKIE = 'promo_popup_show';
    const CONST_VAL_PROMO_CLOSED = 1;
    const CONST_VAL_PROMO_LATER = 2;
    const CONST_POPUP_CONTENT_BLOCK_ID = 'promo_popup_content';
    const XML_CONFIG_MODULE_ENABLED = 'promopopup_settings/general/enabled';
    const XML_CONFIG_WAIT_BEFORE = 'promopopup_settings/general/wait_before';
    const XML_CONFIG_CLOSE_AFTER = 'promopopup_settings/general/close_after';
    const XML_CONFIG_STATIC_BLOCK_ID = 'promopopup_settings/general/static_block_id';

    /**
     * Store specific cookie name
     *
     * @return string
     */
    public function getPromoCookieName()
    {
        $storeCode = Mage::app()->getStore()->getCode();
        return static::CONST_NAME_PROMO_COOKIE . '_' . $storeCode;
    }

    /**
     * Static block ID for content
     *
     * @return string
     */
    public function getPopupContentBlockId()
    {
        return static::CONST_POPUP_CONTENT_BLOCK_ID;
    }

    /**
     * Enabled?
     *
     * @return bool
     */
    public function getModuleStatus()
    {
        $enabled = false;
        if ($this->isModuleEnabled('DMS_PromoPopup')) {
           if (Mage::getStoreConfig(static::XML_CONFIG_MODULE_ENABLED, Mage::app()->getStore())) {
               $enabled = true;
           }
        }
        return $enabled;
    }

    /**
     * Method to obtain store configuration
     *
     * @param $key
     * @return bool|mixed
     */
    public function getStoreConfig($key)
    {
        if ($key) {
            return Mage::getStoreConfig($key, Mage::app()->getStore());
        }
        return false;
    }

    /**
     * How many seconds to wait before showing popup
     *
     * @return bool|mixed
     */
    public function getConfigWaitBefore()
    {
        return $this->getStoreConfig(static::XML_CONFIG_WAIT_BEFORE);
    }

    /**
     * How many seconds to wait before closing the popup
     *
     * @return bool|mixed
     */
    public function getConfigCloseAfter()
    {
        return $this->getStoreConfig(static::XML_CONFIG_CLOSE_AFTER);
    }

    /**
     * Get static block id
     *
     * @return bool|mixed
     */
    public function getConfigStaticBlockId()
    {
        return $this->getStoreConfig(static::XML_CONFIG_STATIC_BLOCK_ID);
    }
}
	 