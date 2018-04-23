<?php

use Composer\Script\Event;

class MoneyFormatPolyfillInstaller {

    public static function preAutoloadDump(Event $ev) {
        if (function_exists('money_format')) {
            $autoloadConfig = $ev->getComposer()->getPackage()->getAutoload();
            unset(
                $autoloadConfig['files'][array_search(
                    'src/money_format.php',
                    $autoloadConfig['files'],
                    true
                )]
            );
            $ev->getComposer()->getPackage()->setAutoload($autoloadConfig);
        }
    }
}