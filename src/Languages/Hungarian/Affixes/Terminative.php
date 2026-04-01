<?php

namespace MuseFx\Agglutinator\Languages\Hungarian\Affixes;

use MuseFx\Agglutinator\Languages\Hungarian\Affixes\Traits\ReplacesLastVowels;

class Terminative extends Affix
{
    use ReplacesLastVowels;

    protected string $affix = '-ig';
}
