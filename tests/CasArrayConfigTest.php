<?php namespace Evdb\Cas\Tests;

use Evdb\Cas\Config\ArrayCasConfig;

class CasArrayConfigTest extends \PHPUnit_Framework_TestCase
{

    public function testStaticConstructor()
    {
        $config = ArrayCasConfig::create(['service' => 'test']);
        $this->assertInstanceOf('Evdb\\Cas\\Config\\CasConfig', $config);
    }

}