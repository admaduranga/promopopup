/**
 * Magento 1.9 Community - Promo Popup
 * @category    DMS
 * @package     DMS_PromoPopup
 * @date        2018-02-12
 * @author      A. Dilhan Maduranga <admaduranga@gmail.com>
 */

var PromoBanner = Class.create();

PromoBanner.prototype = {
    settings: {},

    /**
     * Constructor method
     * @param settings
     */
    initialize: function (settings) {
        this.settings = settings;
    },

    /**
     * Initialize the popup flow
     */
    init: function () {
        this.requestPopup();
    },

    /**
     * Event listeners and handle method definitions
     */
    initListeners: function () {
        try {
            Event.observe($(this.settings.popup_close_id), 'click', this.closePopup.bindAsEventListener(this));
        } catch (e) {
            // error handling to be done. e.g, if an array of elements are present
        }
    },

    /**
     * Validity and Ajax call
     */
    requestPopup: function () {
        var self = this;
        var popupCookie = Mage.Cookies.get(self.settings.cookie_name);
        if (!popupCookie) {
            setTimeout(function(){
                new Ajax.Request(self.settings.url, {
                    method: 'GET',
                    parameters: null,
                    onComplete: self.onRequestComplete.bind(self)
                });
            }, self.settings.wait_before);
        }
    },

    /**
     * Callback method for success
     * @param response
     */
    onRequestComplete: function (response) {
        if (response.status = 200) {
            try {
                this.getElement(this.settings.popup_id).html(JSON.parse(response.responseText));
                this.initListeners();
                this.showPopup();
            } catch (e) {
                console.log('unexpected response');
                // need to handle errors
            }


        }

    },

    /**
     * Close popup
     */
    closePopup: function () {
        this.getElement(this.settings.popup_id).removeClass('popup-shown').hide();
        this.addPopupCookie();
        console.log('closed!');
    },

    /**
     * Show Popup
     */
    showPopup: function () {
        var self = this;
        this.getElement(this.settings.popup_id).addClass('popup-shown').show();
        console.log('popup-shown!');

        setTimeout(function(){
            if (self.getElement(self.settings.popup_id).hasClass('popup-shown')) {
                self.closePopup();
            }
        }, self.settings.close_after);
    },

    /**
     * Add browser cookie
     */
    addPopupCookie: function () {
        var expireAt = Mage.Cookies.expires;
        var lifetime = this.generateCookieExpiry();
        if (lifetime > 0) {
            expireAt = new Date();
            expireAt.setTime(expireAt.getTime() + lifetime);
        }
        if (this.settings.cookie_name) {
            Mage.Cookies.set(this.settings.cookie_name, 1, expireAt);
        }
    },

    /**
     * Cookie lifetime
     * @todo remove the hardcoded values
     * @returns {number}
     */
    generateCookieExpiry: function () {
        // ** Temporary set the expiry date to few dozens of years away
        // ** The expiry generation is taken into a black box method if any need of modifying later
        return 1000 * 100 * 365 * 24 * 3600;
    },

    /**
     * Generate jquery element
     * 
     * @param id
     * @returns {*}
     */
    getElement: function (id) {
        return jQuery('#' + id);
    }
};