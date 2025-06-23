<?php

namespace MuseFx\Agglutinator;

use MuseFx\Agglutinator\Languages\ClassMap;

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

    public function createFromString(string $string): WordBuilder
    {
        return ClassMap::resolve($this->locale, $string);
    }

    public static function createWithLocale(string $locale, string $string): WordBuilder
    {
        return ClassMap::resolve($locale, $string);
    }
}
