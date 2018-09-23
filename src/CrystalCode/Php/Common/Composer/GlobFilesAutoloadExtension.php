<?php

namespace CrystalCode\Php\Common\Composer;

use \Composer\Script\Event;
use \Generator;
use \RecursiveDirectoryIterator;
use \RecursiveIteratorIterator;
use \RegexIterator;

final class GlobFilesAutoloadExtension
{

    /**
     *
     * @param Event $event
     * @return void
     */
    public static function extendAutoload(Event $event)
    {
        $composer = $event->getComposer();
        $package = $composer->getPackage();
        $autoloadMap = $package->getAutoload();
        if (empty($autoloadMap['files'])) {
            return;
        }
        $path = realpath(sprintf('%s/..', $composer->getConfig()->get('vendor-dir')));
        $filePaths = [];
        foreach ($autoloadMap['files'] as $pattern) {
            foreach (static::getFilenameGenerator($path, $pattern) as $filename) {
                $filePaths[] = $filename;
            }
        }
        $autoloadMap['files'] = $filePaths;
        $package->setAutoload($autoloadMap);
    }

    /**
     *
     * @param string $pattern
     * @return string
     */
    private static function transformPattern($pattern)
    {
        $transformedPattern = preg_replace_callback('(([*]{2}|[*]|[?]|[/\\\\]|[^*/\\\\?]+))', function ($matchArray) {
            $match = current($matchArray);
            switch ($match) {
                case '**': return '(?:.*?)';
                case '*': return '(?:[^/\\\\]*?)';
                case '?': return '(?:[^/\\\\])';
                case '\\':
                case '/': return '(?:[/\\\\])';
            }
            return preg_quote($match, '()');
        }, $pattern);
        return sprintf('((?:%s)$)', $transformedPattern);
    }

    /**
     *
     * @param string $path
     * @param string $pattern
     * @return Generator
     */
    private static function getFilenameGenerator($path, $pattern)
    {
        $iterator = new RecursiveDirectoryIterator($path);
        $iterator = new RecursiveIteratorIterator($iterator);
        $iterator = new RegexIterator($iterator, static::transformPattern($pattern));
        foreach ($iterator as $fileInfo) {
            yield $fileInfo->getPathName();
        }
    }

}
