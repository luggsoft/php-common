<?php

namespace CrystalCode\Php\Common;

use Exception;

abstract class ExceptionBase extends Exception
{

    /**
     * 
     * @param string $message
     * @param int $code
     * @param Exception $previous
     */
    public function __construct($message = null, $code = null, Exception $previous = null)
    {
        parent::__construct((string) $message, (int) $code, $previous);
    }

}
