<?php

namespace MuseFx\Agglutinator\Languages\Hungarian\Affixes\Traits;

trait ReplacesLastVowels
{
    protected $replaceLastVowels = [
        'a' => 'á',
        'e' => 'é',
        'A' => 'Á',
        'E' => 'É',
    ];

    public function replaceLastVowels(string $word)
    {
        $lettermap = mb_str_split($word);
        $lastLetter = end($lettermap);
        if (!empty($this->replaceLastVowels[$lastLetter])) {
            array_pop($lettermap);
            array_push($lettermap, $this->replaceLastVowels[$lastLetter]);
            $word = implode('', $lettermap);
        }

        return $word;
    }
}
