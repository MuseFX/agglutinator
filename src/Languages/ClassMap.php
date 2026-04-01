<?php

namespace MuseFx\Agglutinator\Languages;

use MuseFx\Agglutinator as PackageNamespace;
use MuseFx\Agglutinator\Exceptions\LocaleNotFoundException;
use MuseFx\Agglutinator\Languages\Hungarian;
use MuseFx\Agglutinator\Languages\Void as VoidLanguage;
use MuseFx\Agglutinator\Words\Word;

class ClassMap
{
    protected static $namespaces = [
        'hu' => Hungarian::class,
        'default' => VoidLanguage::class,
    ];

    public static function resolve(
        string $locale,
        string $string,
        string $interface,
        bool $strictLang = false
    ): Word {
        $namespace = self::$namespaces[$locale] ?? null;
        $class = $namespace . str_replace(PackageNamespace::class, '', $interface);
        if (empty($class)) {
            if ($strictLang) {
                throw new LocaleNotFoundException($locale);
            }

            $voidClass = self::$namespaces['default'] . str_replace(PackageNamespace::class, '', $interface);
            return new $voidClass($string);
        }

        return new $class($string);
    }
}
