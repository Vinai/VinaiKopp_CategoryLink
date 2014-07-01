<?php


class VinaiKopp_CategoryLink_Model_Observer
{
    public function catalogCategoryFlatLoadnodesBefore(Varien_Event_Observer $event)
    {
        /** @var Varien_Db_Select $select */
        $select = $event->getSelect();
        Mage::getResourceModel('vinaikopp_categorylink/flat')->addLinkUrlToFlatCatalogSelect($select);
    }
    
    public function catalogCategoryCollectionLoadBefore(Varien_Event_Observer $event)
    {
        /** @var Mage_Catalog_Model_Resource_Category_Collection $collection */
        $collection = $event->getData('category_collection');
        $collection->addAttributeToSelect(VinaiKopp_CategoryLink_Helper_Data::ATTR_CODE_LINK);
    }

    public function catalogCategoryCollectionLoadAfter(Varien_Event_Observer $event)
    {
        /** @var Mage_Catalog_Model_Resource_Category_Collection $collection */
        $collection = $event->getData('category_collection');
        foreach ($collection as $category) {
            if ($url = $category->getData(VinaiKopp_CategoryLink_Helper_Data::ATTR_CODE_LINK)) {
                $category->setData('url', $url);
            }
        }
    }
} 