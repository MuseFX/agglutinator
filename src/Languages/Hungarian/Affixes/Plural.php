<?php

namespace MuseFx\Agglutinator\Languages\Hungarian\Affixes;

use MuseFx\Agglutinator\Languages\Hungarian\Affixes\Traits\ReplacesLastVowels;
use MuseFx\Agglutinator\Languages\Hungarian\Tools\VowelHarmonyResolver;

class Plural extends Affix
{
    use ReplacesLastVowels;

    protected string $affix = '-k';

    protected array $interfixesOnConsonantEnding = [
        '-o-' => [ VowelHarmonyResolver::LOW, VowelHarmonyResolver::MIXED ],
        '-e-' => [ VowelHarmonyResolver::HIGH ]
    ];
}
