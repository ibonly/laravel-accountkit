<?php

namespace Ibonly\AccountKit\Test;

use \Mockery as m;
use Ibonly\AccountKit\AccountKit;
use PHPUnit_Framework_TestCase;

class AccountKitTest extends PHPUnit_Framework_TestCase
{
	protected $accountkit;

	public function setUp()
	{
		$this->accountkit = m::mock('Ibonly\AccountKit\AccountKit');
	}

    public function tearDown()
    {
        m::close();
    }

    /**
     * @param string $assert
     * @param string $expectedType
     * @param string $receive
     */
    public function receiveAndReturn($assert, $expectedType, $receive, $return)
    {
        $value = $this->accountkit->shouldReceive($receive)->andReturn($return);

        $this->$assert($expectedType, gettype($value));
    }

	public function testShouldGetFacebookAppId()
	{
        $this->receiveAndReturn('assertEquals', 'object', 'getFacebookAppID', 'client_id');
	}

	public function testShouldGetFacebookAppSecret()
	{
        $this->receiveAndReturn('assertEquals', 'object', 'getFacebookAppSecret', 'client_secret');
	}
}
