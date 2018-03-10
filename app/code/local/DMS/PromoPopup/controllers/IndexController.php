<?php
/**
 * Sample Exercise Module
 * @category    DMS
 * @package     DMS_PromoPopup
 * @date        2018-02-12
 * @author      A. Dilhan Maduranga <admaduranga@gmail.com>
 */

class DMS_PromoPopup_IndexController extends Mage_Core_Controller_Front_Action
{
    /**
     * promopopup_index_index action
     */
    public function IndexAction()
    {
        if ($this->getRequest()->isAjax()) {
            // ** proceed only if ajax request
            $this->loadLayout();

            $this->getResponse()->clearHeaders()->setHeader(
                'Content-type',
                'application/json'
            );

            $popupContent = trim($this->getPopupContent());
            if (!empty($popupContent)) {
                $this->getResponse()->setBody(
                    Mage::helper('core')->jsonEncode($popupContent)
                );
            }
        } else {
            // ** if not ajax request, redirect to home page
            $this->_redirect('/');
        }
    }

    /**
     * Get the output content for the ajax request
     * Using the block defined in layout
     *
     * @return string
     */
    public function getPopupContent()
    {
        return $this->getLayout()->getBlock('promopopup_box')->toHtml();
    }
}