<?php

namespace MuseFx\Agglutinator\Languages;

use MuseFx\Agglutinator\Exceptions\LocaleNotFoundException;
use MuseFx\Agglutinator\Languages\Hungarian\Hungarian;
use MuseFx\Agglutinator\WordBuilder;

class ClassMap
{
    protected static $classmap = [
        'hu' => Hungarian::class
    ];

    public static function resolve(string $locale, string $string, bool $strictLang = false): WordBuilder
    {
        $class = self::$classmap[$locale] ?? null;
        if (empty($class)) {
            if ($strictLang) {
                throw new LocaleNotFoundException($locale);
            }

            return new VoidLanguage($string);
        }

        return new $class($string);
    }
}
