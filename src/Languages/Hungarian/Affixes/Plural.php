<?php

namespace MuseFx\Agglutinator\Languages\Hungarian\Affixes;

use MuseFx\Agglutinator\Languages\Hungarian\Affixes\Traits\ReplacesLastVowels;
use MuseFx\Agglutinator\Languages\Hungarian\Tools\VowelHarmonyResolver;

class Plural
{
    use ReplacesLastVowels;

    protected array $affixes = '-k';

    protected array $interfixes = [
        '-o-' => [ VowelHarmonyResolver::LOW, VowelHarmonyResolver::MIXED ],
        '-e-' => [ VowelHarmonyResolver::HIGH ]
    ];
}
