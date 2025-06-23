<?php

namespace MuseFx\Agglutinator\Languages\Hungarian\Cases;

use MuseFx\Agglutinator\Languages\Hungarian\Tools\VowelHarmonyResolver;
use MuseFx\Agglutinator\Languages\Hungarian\Traits\ReplacesLastVowels;

class Dative
{
    use ReplacesLastVowels;

    protected string $word;

    protected array $affixes = [
        '{-}nak' => [ VowelHarmonyResolver::LOW, VowelHarmonyResolver::MIXED ],
        '{-}nek' => [ VowelHarmonyResolver::HIGH ],
    ];

    public function __construct(string $word)
    {
        $this->word = $word;
    }

    public function apply(): string
    {
        $adjuncted = $this->replaceLastVowels($this->word);
        $harmonyResolver = new VowelHarmonyResolver($this->word);
        $vowelHarmony = $harmonyResolver->getVowelHarmony();
        foreach ($this->affixes as $affix => $harmonies) {
            if (in_array($vowelHarmony, $harmonies)) {
                $adjuncted = str_replace('{-}', $adjuncted, $affix);
                break;
            }
        }

        return $adjuncted;
    }
}
