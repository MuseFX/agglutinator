<?php

namespace MuseFx\Agglutinator\Languages;

use MuseFx\Agglutinator\Exceptions\LocaleNotFoundException;
use MuseFx\Agglutinator\Languages\Hungarian\Words\Noun as HungarianNoun;
use MuseFx\Agglutinator\Languages\Void\Words\Noun as VoidNoun;
use MuseFx\Agglutinator\Words\Noun as AbstractNoun;
use MuseFx\Agglutinator\Words\Word;

class ClassMap
{
    protected static $classmap = [
        'hu' => [
            AbstractNoun::class => HungarianNoun::class
        ],
        'default' => [
            AbstractNoun::class => VoidNoun::class
        ]
    ];

    public static function resolve(
        string $locale,
        string $string,
        string $interface,
        bool $strictLang = false
    ): Word {
        $class = self::$classmap[$locale][$interface] ?? null;
        if (empty($class)) {
            if ($strictLang) {
                throw new LocaleNotFoundException($locale);
            }

            $voidClass = self::$classmap['default'][$interface];
            return new $voidClass($string);
        }

        return new $class($string);
    }
}
