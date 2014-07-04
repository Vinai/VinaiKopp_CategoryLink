<?php


class VinaiKopp_CategoryLink_Model_Entity_Attribute_Backend_UrlTest
    extends PHPUnit_Framework_TestCase
{
    private $class = 'VinaiKopp_CategoryLink_Model_Entity_Attribute_Backend_Url';

    /**
     * @return VinaiKopp_CategoryLink_Model_Entity_Attribute_Backend_Url
     */
    private function getInstance()
    {
        /** @var VinaiKopp_CategoryLink_Model_Entity_Attribute_Backend_Url $instance */
        $instance = new $this->class;

        $mockHelper = $this->getMock('VinaiKopp_CategoryLink_Helper_Data');
        $mockHelper->expects($this->any())
            ->method('__')
            ->will($this->returnArgument(0));
        $instance->setHelper($mockHelper);

        $mockAttribute = $this->getMockForAbstractClass(
            'Mage_Eav_Model_Entity_Attribute_Abstract',
            array(), // Arguments
            '', // Mock class name
            false, // Call original constructor
            true, // Call original clone
            true, // Call autoload
            array('getAttributeCode', 'getFrontendLabel')
        );
        $mockAttribute->expects($this->any())
            ->method('getAttributeCode')
            ->will($this->returnValue('dummy'));
        $mockAttribute->expects($this->any())
            ->method('getFrontendLabel')
            ->will($this->returnValue('Dummy Attribute'));
        $instance->setAttribute($mockAttribute);

        return $instance;
    }

    private function getMockDataModel($domain)
    {
        $mockModel = $this->getMockForAbstractClass(
            'Mage_Core_Model_Abstract',
            array(), // Arguments
            '', // Mock class name
            false, // Call original constructor
            true, // Call original clone
            true, // Call autoload
            array('hasData', 'getData')
        );
        $mockModel->expects($this->any())
            ->method('hasData')
            ->will($this->returnValue(true));

        $mockModel->expects($this->any())
            ->method('getData')
            ->will($this->returnValue($domain));

        return $mockModel;
    }
    
    public static function setUpBeforeClass()
    {
        if (! class_exists('Mage', false)) {
            $mageFiles = array(
                '/../../../../../../../app/Mage.php',
                '/../../../../../../../../../app/Mage.php',
            );
            foreach ($mageFiles as $mageFile) {
                if (file_exists(__DIR__ . $mageFile)) {
                    require_once __DIR__ . $mageFile;
                }
            }
        }
        if (! class_exists('Mage', false)) {
            throw new RuntimeException('Unable to locate app/Mage.php');
        }
        // Fix error handler
        $handler = set_error_handler(function () { return false; });
        set_error_handler(function ($errno, $errstr, $errfile, $errline)
        use ($handler) {
            if (E_WARNING === $errno
                && 0 === strpos($errstr, 'include(')
                && substr($errfile, -19) == 'Varien/Autoload.php'
            ) {
                return null;
            }
            if (! $handler) return false;
            return call_user_func($handler, $errno, $errstr, $errfile, $errline);
        });
    }

    public function validUrlDataProvider()
    {
        return array(
            array(''),
            array('http://domain.com'),
            array('http://domain.com/'),
            array('http://domain.com/x'),
            array('http://domain.com/x.html'),
            array('http://domain.com/x.html/'),
            array('http://domain.com/x.html/?'),
            array('http://domain.com/?'),
            array('http://domain.com/?a=b'),
            array('https://domain.com'),
            array('ftp://domain.com'),
        );
    }

    public function invalidUrlDataProvider()
    {
        return array(
            array('xxx'),
            array('xxx.yyy'),
            array('xxx/'),
            array('/xxx/'),
            array('www.example.com/'),
            array('htp://www.example.com/'),
            array('http:/www.example.com/'),
            array('http//www.example.com/'),
            array('http://.example.com/'),
        );
    }

    /**
     * No exception thrown means test passed
     * 
     * @param string $url
     * @dataProvider validUrlDataProvider
     */
    public function testItValidatesAUrl($url)
    {
        $instance = $this->getInstance();
        $dataModel = $this->getMockDataModel($url);
        $instance->beforeSave($dataModel);
    }
    
    /**
     * @param string $url
     * @dataProvider invalidUrlDataProvider
     * @expectedException RuntimeException
     * @expectedExceptionMessage Please specify a full URL including http://, https:// or ftp:// for for the attribute
     */
    public function testItShouldNotValidateInvalidUrls($url)
    {
        $instance = $this->getInstance();
        $dataModel = $this->getMockDataModel($url);
        $instance->beforeSave($dataModel);
    }
} 