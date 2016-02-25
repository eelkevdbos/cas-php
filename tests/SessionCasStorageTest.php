<?php namespace Evdb\Cas\Tests;

use Evdb\Cas\Storage\SessionCasStorage;

class SessionCasStorageTest extends \PHPUnit_Framework_TestCase
{

    protected $storage;

    public function setUp()
    {
        $this->storage = new SessionCasStorage();
    }

    public function testSetter()
    {
        $this->storage->set('a', 'b');
        $this->assertTrue(isset($_SESSION['a']));
    }

    public function testGetter()
    {
        //test default values
        $this->assertEquals('default', $this->storage->get('non-existent', 'default'));

        $_SESSION['a'] = 'b';
        $this->assertEquals('b', $this->storage->get('a'));
    }

}