<?php
/**
 * Magento 1.9 Community - Promo Popup
 * @category    DMS
 * @package     DMS_PromoPopup
 * @date        2018-02-12
 * @author      A. Dilhan Maduranga <admaduranga@gmail.com>
 */

// ** Static block referred by the popup for default content

$data = array('promo_popup_content' => array(
    'title'         => 'Promo Popup Content (Default)',
    'identifier'    => 'promo_popup_content',
    'is_active'     => 1,
    'content'       => '<h2>Demo Content for Content Popup</h2><p>Please Customize!</p>'
));

foreach ($data as $id => $blockData){
    $block = Mage::getModel('cms/block');
    $block->setData($blockData);
    $block->setStores(array(0));
    $block->save();
}
