<?php

namespace MuseFx\Agglutinator\Tools;

abstract class PhonemeTypeResolver
{
    public const VOWEL = 1;
    public const CONSONANT = 2;
    public const UNDEFINED = -1;

    protected array $vowels = [];
    protected array $consonants = [];

    protected string $word;
    protected array $mapping;

    public function __construct(string $word)
    {
        $this->word = $word;
        $this->resolve();
    }

    protected function resolve(): self
    {
        $letters = $this->getLetterMappings();
        $wordSlice = mb_strtolower($this->word);

        while (!empty($wordSlice)) {
            $added = false;
            foreach ($letters as $letter => $phoneme) {
                if (mb_strpos($wordSlice, $letter) === 0) {
                    $this->mapping[] = [
                        'letter' => $letter,
                        'phoneme' => $phoneme
                    ];
                    $wordSlice = mb_substr($wordSlice, mb_strlen($letter));
                    $added = true;
                    break;
                }
            }
            if ($added == false) {
                $this->mapping[] = [
                    'letter' => mb_substr($wordSlice, 0, 1),
                    'phoneme' => self::UNDEFINED,
                ];
                $wordSlice = mb_substr($wordSlice, 1);
            }
        }

        return $this;
    }

    protected function getLetterMappings(): array
    {
        $letters = array_fill_keys($this->vowels, self::VOWEL);
        $letters += array_fill_keys($this->consonants, self::CONSONANT);

        uksort($letters, function ($letter1, $letter2) {
            $length1 = mb_strlen($letter1);
            $length2 = mb_strlen($letter2);
            if ($length1 > $length2) {
                return -1;
            }
            if ($length1 < $length2) {
                return 1;
            }
        });

        return $letters;
    }

    public function getMapping(): array
    {
        return $this->mapping;
    }

    public function getLastLetterPhoneme()
    {
        $last = end($this->mapping);
        return $last['phoneme'] ?? false;
    }
}
