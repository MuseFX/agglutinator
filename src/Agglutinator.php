<?php

namespace MuseFx\Agglutinator;

use MuseFx\Agglutinator\Languages\ClassMap;
use MuseFx\Agglutinator\Words\Noun;

class Agglutinator
{
    protected string $locale;

    public function __construct(string $locale)
    {
        $this->locale = $locale;
    }

    public function setLocale(string $locale): self
    {
        $this->locale = $locale;

        return $this;
    }

    public function createNoun(string $string): Noun
    {
        return ClassMap::resolve($this->locale, $string, Noun::class);
    }

    public static function createNounWithLocale(string $locale, string $string): Noun
    {
        return ClassMap::resolve($locale, $string, Noun::class);
    }
}
