
# Magento 1.9 Community - Promo Popup
## Ajax based popup for first time visitors

Displays a popup that appears when a user visits the website for the very first time only.
Once closed, this popup will never appear to the customer again. (Until his browser cookies are flushed)

- The popup will only show to first time visitors of the site, and it should show on any of the site
pages.
- We should be able to enable or disable this functionality from the backend.
- The popup should have a delay time before showing to the customer, ex: 3 secs.
- If a customer closes the popup it shouldn't show to them again.
- Administrator can assign different content in the popup depending on store view. (Using Static Blocks)

## Ajax Request based Content Fetch
The module use an ajax server request to get the popup content and then display as a popup
**Benefits of this method are as follows**
1. The website is running on Magento Community 1.9.3.7 therefore Full page cache is not
available. Loading the popup content at the body end area will be executed for every
page load and therefore will be a performance hit
2. Popup only displayed once for lifetime (of the cookie) therefore it is useless to append
the content to page body
3. Only if the popup should be displayed, then only the popup content is fetched.
4. The logic is handled by a javascript file, which is always included in the default layout
handle. But won’t be a much waste as JS is static content and can be cached in CDN and
browser.

## Bonus Features
(Bonus) We should be able to have different content in the popup depending on store view.

### 1. Store Specific Content Via Static Blocks

There is a static block added via setup scripts for all store views. This static block will contain the content to the popup.  
The static block content will be default content for all store views

- If store views specific content is needed, create a new block with same identifier and change the content, then assign to this specific store view.
- All the WYSIWYG capabilities are now available due to the use of static blocks
- The block identifier for the popup can be customized in store configurations
- Cookies are used to determine the show status and store specific cookies are used

### 2. Popup Automatically closes after an Amount of Seconds
This way even if user didn’t interact with the popup, it is closed and will never show again. Duration for this auto close can be configured in store configurations

### 3. No Built in JS  Libraries are Used
At the moment, no extra JS libraries are used. Its running on native JS (prototype/jQuery) and CSS. But can be customized for more features.

## Improvements
I can think of following improvements
- More attractive styles and fading effects for the popup
- MAY BE LATER button or link so the popup will show again after a month or so.
