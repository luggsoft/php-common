<?php

namespace Luggsoft\Php\Common;

final class Path
{
    
    /**
     *
     * @param string $path
     * @param string $separator
     * @return string
     */
    public static function normalize(string $path, string $separator = '/'): string
    {
        $segments = [];
        
        foreach (preg_split('([\\\\/]+)', $path, -1, PREG_SPLIT_NO_EMPTY) as $segment) {
            switch ($segment) {
                case '.':
                    break;
                case '..':
                    array_pop($segments);
                    break;
                default:
                    array_push($segments, $segment);
                    break;
            }
        }
        
        return implode($separator, $segments);
    }
    
}
