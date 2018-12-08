<?php

namespace CrystalCode\Php\Common;

use Throwable;

final class NotImplementedException extends ExceptionBase
{

    /**
     * 
     * @param string $message
     * @param int $code
     * @param Throwable $previous
     */
    public function __construct(string $message = null, int $code = null, Throwable $previous = null)
    {
        if (empty($message)) {
            $message = 'This operation is not implemented';
        }
        parent::__construct($message, $code, $previous);
    }

}
