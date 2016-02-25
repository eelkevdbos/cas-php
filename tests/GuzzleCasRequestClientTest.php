<?php namespace Evdb\Cas\Tests;

use Evdb\Cas\Request\GuzzleCasRequestClient;

class GuzzleCasRequestClientTest extends \PHPUnit_Framework_TestCase
{

    public function testStaticConstructor()
    {
        $client = GuzzleCasRequestClient::create();
        $this->assertInstanceOf('Evdb\\Cas\\Request\\CasRequestClient', $client);
    }

}