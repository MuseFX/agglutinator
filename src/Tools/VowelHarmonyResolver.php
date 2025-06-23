<?php

namespace MuseFx\Agglutinator\Tools;

abstract class VowelHarmonyResolver
{
    public const LOW = 1;
    public const HIGH = 2;
    public const MIXED = 3;

    protected const VOWEL_LOW = 1;
    protected const VOWEL_HIGH = 2;
    protected const NOT_A_VOWEL = 0;

    protected array $low = [];
    protected array $high = [];

    protected $word;

    protected array $harmonyMap;

    public function __construct(string $word)
    {
        $this->word = $word;
        $this->resolve();
    }

    protected function resolve(): self
    {
        // use only the last part
        $words = explode(' ', $this->word);
        $neededWord = end($words);
        $neededWord = mb_strtolower($neededWord);

        $this->harmonyMap = array_map(
            function ($char) {
                if (in_array($char, $this->low)) {
                    return self::VOWEL_LOW;
                }
                if (in_array($char, $this->high)) {
                    return self::VOWEL_HIGH;
                }

                return self::NOT_A_VOWEL;
            },
            mb_str_split($neededWord)
        );

        return $this;
    }

    public function getHarmonyMap()
    {
        return $this->harmonyMap;
    }

    public function getHarmonyCounts()
    {
        $counts = [
            self::VOWEL_HIGH => 0,
            self::VOWEL_LOW => 0,
        ];
        foreach ($this->harmonyMap as $harmony) {
            if ($harmony === self::VOWEL_HIGH) {
                $counts[self::VOWEL_HIGH]++;
            } elseif ($harmony === self::VOWEL_LOW) {
                $counts[self::VOWEL_LOW]++;
            }
        }

        return $counts;
    }

    public function getVowelHarmony()
    {
        $counts = $this->getHarmonyCounts();
        if ($counts[self::VOWEL_HIGH] > 0 && $counts[self::VOWEL_LOW] == 0) {
            return self::HIGH;
        }
        if ($counts[self::VOWEL_LOW] > 0 && $counts[self::VOWEL_HIGH] == 0) {
            return self::LOW;
        }

        return self::MIXED;
    }
}
