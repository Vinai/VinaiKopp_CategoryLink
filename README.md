Category Link URL
=================
Add the ability to optionally specify external or internal URL's for categories that will be used instead of the "real" category URL whenever a link to the category is rendered.  

Facts
-----
- Version: check the [config.xml](https://github.com/Vinai/VinaiKopp_CategoryLink/blob/master/app/code/community/VinaiKopp/CategoryLink/etc/config.xml)
- Extension key: - This extension is not on Magento Connect (github only) -
- [Extension on GitHub](https://github.com/Vinai/VinaiKopp_CategoryLink)
- [Direct download link](https://github.com/Vinai/VinaiKopp_CategoryLink/zipball/master)

Description
-----------
This module adds allows the administrator to optionally specify an URL for a category.  
The URL has to be fully qualified with schema (e.g. http://) and a domain name.  
If an URL is specified on a category, then whenever a link to the category is rendered (for example in the top navigation), the specified URL will be used instead of the original "real" URL.  

One possible use case for example is to add links to CMS pages to the top navigation.

Compatibility
-------------
- Magento >= 1.6
- No class rewrites, only event observers.
- Works with and without the flat catalog category tables.

Installation Instructions
-------------------------
1. If you use the Magento compiler, disable compilation mode.
2. Unpack the extension ZIP file in your Magento root directory.
3. Clear the cache.
4. If you use the Magento compiler, recompile.
5. Regenerate the category flat table index (if you use the flat category table)

Support
-------
If you have any issues with this extension, open an issue on GitHub (see URL above)

Contribution
------------
Any contributions are highly appreciated. The best way to contribute code is to open a
[pull request on GitHub](https://help.github.com/articles/using-pull-requests).

Developer
---------
Vinai Kopp  
[http://vinaikopp.com](http://vinaikopp.com)  
[@VinaiKopp](https://twitter.com/VinaiKopp)  

Licence
-------
[OSL - Open Software Licence 3.0](http://opensource.org/licenses/osl-3.0.php)

Copyright
---------
(c) 2014 Vinai Kopp