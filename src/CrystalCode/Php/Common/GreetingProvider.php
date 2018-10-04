<?php

namespace CrystalCode\Php\Common;

final class GreetingProvider
{

    /**
     * 
     * @param string $name
     * @return string
     */
    public function getGreeting($name)
    {
        return sprintf('Hello, %s!', $name);
    }

}
