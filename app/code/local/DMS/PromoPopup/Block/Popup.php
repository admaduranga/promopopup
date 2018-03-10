<?php
/**
 * Magento 1.9 Community - Promo Popup
 * @category    DMS
 * @package     DMS_PromoPopup
 * @date        2018-02-12
 * @author      A. Dilhan Maduranga <admaduranga@gmail.com>
 */

class DMS_PromoPopup_Block_Popup extends Mage_Core_Block_Template
{
    /**
     * Settings for the promo popup js
     * @return array
     */
    public function getSettings()
    {
        $settings = array();
        $helper = Mage::helper('promopopup');
        $settings['url'] = $this->getUrl('promopopup/index/index');
        $settings['wait_before'] = $helper->getStoreConfig(DMS_PromoPopup_Helper_Data::XML_CONFIG_WAIT_BEFORE);
        $settings['close_after'] = $helper->getStoreConfig(DMS_PromoPopup_Helper_Data::XML_CONFIG_CLOSE_AFTER);
        $settings['cookie_name'] = Mage::helper('promopopup')->getPromoCookieName();
        return $settings;
    }

    /**
     * Get the actual content of the displayed popup
     * @return mixed
     */
    public function getPopupContent()
    {
        $blockId = Mage::helper('promopopup')->getPopupContentBlockId();
        return $this->getLayout()->createBlock('cms/block')->setBlockId($blockId)->toHtml();
    }

    /**
     * Module enabled in system && in store config
     * @return mixed
     */
    public function isModuleEnabled()
    {
        return Mage::helper('promopopup')->getModuleStatus();
    }
}