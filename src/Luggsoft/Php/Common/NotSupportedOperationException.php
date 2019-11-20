<?php

namespace Luggsoft\Php\Common;

use Throwable;

final class NotSupportedOperationException extends OperationException
{
    
    /**
     *
     * @param string $name
     * @param string $message
     * @param int $code
     * @param Throwable $previous
     */
    public function __construct(string $name, string $message = null, int $code = null, Throwable $previous = null)
    {
        if ($message === null) {
            $message = vsprintf('The operation "%s" is not supported', [
                $name,
            ]);
        }
        
        parent::__construct($name, $message, $code, $previous);
    }
    
}
