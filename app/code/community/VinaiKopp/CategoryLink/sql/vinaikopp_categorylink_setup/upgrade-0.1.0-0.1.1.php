<?php

/** @var Mage_Catalog_Model_Resource_Setup $installer */
$installer = Mage::getResourceModel('catalog/setup', 'catalog_setup');

$installer->startSetup();

$installer->updateAttribute(
    'catalog_category',
    VinaiKopp_CategoryLink_Helper_Data::ATTR_CODE_LINK,
    'frontend_class',
    'validate-url'
);

$installer->updateAttribute(
    'catalog_category',
    VinaiKopp_CategoryLink_Helper_Data::ATTR_CODE_LINK,
    'backend_model',
    'vinaikopp_categorylink/entity_attribute_backend_url'
);

$installer->endSetup();