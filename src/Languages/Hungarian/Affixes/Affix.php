<?php

namespace MuseFx\Agglutinator\Languages\Hungarian\Affixes;

use MuseFx\Agglutinator\Languages\Hungarian\Tools\PhonemeTypeResolver;
use MuseFx\Agglutinator\Languages\Hungarian\Tools\VowelHarmonyResolver;

abstract class Affix
{
    protected string $word;

    protected string $affix;

    protected array $affixesByHarmony = [];

    protected array $interfixesOnConsonantEnding = [];

    protected ?string $appliedAffix = null;

    public function __construct(string $word)
    {
        $this->word = $word;
    }

    public function apply(string &$appliedAffix = null): string
    {
        if (method_exists($this, 'replaceLastVowels')) {
            $affixed = $this->replaceLastVowels($this->word);
        }
        $harmonyResolver = new VowelHarmonyResolver($this->word);
        $vowelHarmony = $harmonyResolver->getVowelHarmony();

        $setAffix = '';
        if (!empty($this->affixesByHarmony)) {
            foreach ($this->affixesByHarmony as $affix => $harmonies) {
                if (in_array($vowelHarmony, $harmonies)) {
                    $setAffix = $affix;
                    break;
                }
            }
        } else {
            $setAffix = $this->affix;
        }

        if (!empty($this->interfixesOnConsonantEnding)) {
            $phonemeResolver = new PhonemeTypeResolver($this->word);
            if (
                $phonemeResolver->getLastLetterPhoneme() == PhonemeTypeResolver::CONSONANT
            ) {
                $setInterfix = '';
                foreach ($this->interfixesOnConsonantEnding as $interfix => $harmonies) {
                    if (in_array($vowelHarmony, $harmonies)) {
                        $setInterfix = $interfix;
                        break;
                    }
                }
                if (!empty($setInterfix)) {
                    $setInterfix = rtrim($setInterfix, '-');
                    $setAffix = str_replace('-', $setInterfix, $setAffix);
                }
            }
        }

        $this->appliedAffix = $appliedAffix = $setAffix;

        $affixed = str_replace('-', $affixed, $setAffix);

        return $affixed;
    }

    public function getAppliedAffix(): ?string
    {
        return $this->appliedAffix;
    }
}
