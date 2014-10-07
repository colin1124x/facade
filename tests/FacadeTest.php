<?php

class FacadeTest extends PHPUnit_Framework_TestCase
{
    public function testSetApplication()
    {
        $app = new Rde\Application();

        Rde\Facade::setApplication($app);

        $this->assertEquals($app, Rde\Facade::getApplication());
    }

    public function testFetchApplication()
    {
        $this->assertInstanceOf(
            'Rde\\Application',
            Rde\Facade::getApplication(), '檢查\Rde\Facade::getApplication');
        $this->assertInstanceOf(
            'Rde\\Application',
            Fake\WrongFacade::getApplication(), '檢查\Fake\WrongFacade::getApplication');
        $this->assertInstanceOf(
            'Rde\\Application',
            Fake\TestFacade::getApplication(), '檢查\Fake\TestFacade::getApplication');
    }

    /**
     * @expectedException \RuntimeException
     * @expectedExceptionMessage Fake\WrongFacade必須實作getName靜態方法
     */
    public function testExtendError()
    {
        Fake\WrongFacade::getInstance();
    }

    public function testExtendRight()
    {
        $app = Fake\TestFacade::getApplication();
        $app['test'] = new Fake\MyService();
        $app['test'];

        $this->assertEquals(
            $app['test'],
            Fake\TestFacade::getInstance(), '檢查取得應用程序物件實體');

        $this->assertEquals(
            array(
                'method' => 'callMethodNameX',
                'args' => array(3 ,2, 1),
            ),
            Fake\TestFacade::callMethodNameX(3, 2, 1), '檢查反射狀態(3個參數)');

        $this->assertEquals(
            array(
                'method' => 'callMethodNameY',
                'args' => array(),
            ),
            Fake\TestFacade::callMethodNameY(), '檢查反射狀態(0個參數)');

        $this->assertEquals(
            array(
                'method' => 'callMethodNameZ',
                'args' => array(6, 5, 4, 3, 2, 1),
            ),
            Fake\TestFacade::callMethodNameZ(6, 5, 4, 3, 2, 1), '檢查反射狀態(6個參數)');
    }
}
