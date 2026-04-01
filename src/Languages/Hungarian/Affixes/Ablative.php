<?php

namespace MuseFx\Agglutinator\Languages\Hungarian\Affixes;

use MuseFx\Agglutinator\Languages\Hungarian\Affixes\Traits\ReplacesLastVowels;
use MuseFx\Agglutinator\Tools\VowelHarmonyResolver;

class Ablative extends Affix
{
    use ReplacesLastVowels;

    protected array $affixesByHarmony = [
        '-tól' => [ VowelHarmonyResolver::LOW, VowelHarmonyResolver::MIXED ],
        '-től' => [ VowelHarmonyResolver::HIGH ],
    ];
}
