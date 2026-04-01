<?php

namespace MuseFx\Agglutinator\Languages\Hungarian\Affixes;

use MuseFx\Agglutinator\Languages\Hungarian\Affixes\Traits\ReplacesLastVowels;
use MuseFx\Agglutinator\Languages\Hungarian\Tools\VowelHarmonyResolver;

class Dative extends Affix
{
    use ReplacesLastVowels;

    protected string $word;

    protected array $affixesByHarmony = [
        '-nak' => [ VowelHarmonyResolver::LOW, VowelHarmonyResolver::MIXED ],
        '-nek' => [ VowelHarmonyResolver::HIGH ],
    ];
}
