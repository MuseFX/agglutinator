<?php

namespace MuseFx\Agglutinator\Languages\Hungarian\Tools;

use MuseFx\Agglutinator\Tools\VowelHarmonyResolver as AbstractResolver;

class VowelHarmonyResolver extends AbstractResolver
{
    protected array $high = [
        'e', 'é', 'i', 'í', 'ö', 'ő', 'ü', 'ű',
    ];

    protected array $low = [
        'a', 'á', 'o', 'ó', 'u', 'ú',
    ];
}
