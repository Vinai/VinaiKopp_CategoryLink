<?php


class VinaiKopp_CategoryLink_Model_Resource_Flat
    extends Mage_Catalog_Model_Resource_Category_Flat
{
    public function addLinkUrlToFlatCatalogSelect(Varien_Db_Select $select)
    {
        $select->columns(array('url' => VinaiKopp_CategoryLink_Helper_Data::ATTR_CODE_LINK));
    }
}