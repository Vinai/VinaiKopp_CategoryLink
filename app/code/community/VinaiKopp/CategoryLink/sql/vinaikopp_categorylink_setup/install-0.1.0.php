<?php

/** @var Mage_Catalog_Model_Resource_Setup $installer */
$installer = Mage::getResourceModel('catalog/setup', 'catalog_setup');

$installer->startSetup();

$installer->addAttribute('catalog_category', VinaiKopp_CategoryLink_Helper_Data::ATTR_CODE_LINK, array(
    'label' => 'Category Link URL',
    'type' => 'varchar',
    'input' => 'text',
    'is_configurable' => 0,
    'required' => 0,
    'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE
));

$installer->endSetup();