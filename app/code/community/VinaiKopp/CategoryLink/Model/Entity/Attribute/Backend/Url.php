<?php


class VinaiKopp_CategoryLink_Model_Entity_Attribute_Backend_Url
    extends Mage_Eav_Model_Entity_Attribute_Backend_Abstract
{
    /**
     * @var VinaiKopp_CategoryLink_Helper_Data
     */
    protected $_helper;
    
    public function setHelper(VinaiKopp_CategoryLink_Helper_Data $helper)
    {
        $this->_helper = $helper;
    }

    public function getHelper()
    {
        return $this->_helper ? $this->_helper : Mage::helper('vinaikopp_categorylink');
    }

    public function beforeSave($object)
    {
        $attrCode = $this->getAttribute()->getAttributeCode();
        if ($object->hasData($attrCode)) {
            $value = trim($object->getData($attrCode));
            if ('' !== $value) {
                if (!preg_match('#^(?:http|https|ftp)://[a-z][a-z.]*\.[a-z]+#', $value)) {
                    throw new RuntimeException($this->getHelper()->__('Please specify a full URL including http://, https:// or ftp:// for for the attribute "%s"', $this->getAttribute()->getFrontendLabel()));
                    //Mage::throwException($this->getHelper()->__('Please specify a full URL.'));
                }
            }
        }
        return parent::beforeSave($object);
    }

}