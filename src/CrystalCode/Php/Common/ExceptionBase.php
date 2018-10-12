<?php

namespace CrystalCode\Php\Common;

use \Exception;
use \Throwable;

abstract class ExceptionBase extends Exception
{

    /**
     * 
     * {@inheritdoc}
     */
    public function __construct(string $message = null, int $code = null, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}
