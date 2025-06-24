<?php

namespace MuseFx\Agglutinator\Languages\Hungarian\Affixes;

abstract class Affix
{
    protected string $word;

    protected string $affix;

    protected array $affixesByHarmony = [];

    public function __construct(string $word)
    {
        $this->word = $word;
    }

    public function apply(): string
    {
        if (method_exists($this, 'replaceLastVowels')) {
            $affixed = $this->replaceLastVowels($this->word);
        }
        $harmonyResolver = new VowelHarmonyResolver($this->word);
        $vowelHarmony = $harmonyResolver->getVowelHarmony();

        $affix = '';
        if (!empty($this->affixesByHarmony)) {
            foreach ($this->affixesByHarmony as $affix => $harmonies) {
                if (in_array($vowelHarmony, $harmonies)) {
                    $affixed = str_replace('-', $affixed, $affix);
                    break;
                }
            }
        } else {
            $affix = $this->affix;
        }

        return $affixed;
    }
}
