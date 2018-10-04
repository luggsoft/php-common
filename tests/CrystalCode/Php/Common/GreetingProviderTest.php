<?php

namespace CrystalCode\Php\Common;

use \PHPUnit\Framework\TestCase;

class GreetingProviderTest extends TestCase
{

    /**
     * 
     * @return void
     */
    public function testGetGreeting()
    {
        $greetingProvider = new GreetingProvider();
        $greeting = $greetingProvider->getGreeting('Bob');

        $this->assertEquals('Hello, Bob!', $greeting);
    }

}
