<?php

namespace Luggsoft\Php\Common;

use Exception;
use Throwable;

abstract class ExceptionBase extends Exception
{
    
    /**
     *
     * @param string $message
     * @param int $code
     * @param Throwable $previous
     */
    public function __construct(string $message = null, int $code = null, Throwable $previous = null)
    {
        parent::__construct((string) $message, (int) $code, $previous);
    }
    
}
