<?php

namespace MuseFx\Agglutinator\Tools;

abstract class PhonemeTypeResolver
{
    public const VOWEL = 1;
    public const CONSONANT = 2;

    protected array $vowels = [];
    protected array $consonants = [];
}
