<?php

namespace MuseFx\Agglutinator\Languages\Hungarian\Tools;

use MuseFx\Agglutinator\Tools\PhonemeTypeResolver as BaseResolver;

class PhonemeTypeResolver extends BaseResolver
{
    protected array $vowels = [
        'a', 'á', 'e', 'é', 'i', 'í', 'o', 'ó', 'ö', 'ő', 'u', 'ú', 'ü', 'ű',
    ];

    protected array $consonants = [
        'b', 'd', 'g', 'gy', 'k', 'p', 't', 'ty', 'cs', 'dzs', 'f', 'h', 'j', 'l', 'm', 'n', 'ny', 'r', 's', 'sz', 'z', 'zs', 'v',
    ];
}
