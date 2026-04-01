<?php

namespace MuseFx\Agglutinator\Languages\Hungarian\Words;

use MuseFx\Agglutinator\Languages\Hungarian\Affixes\Ablative;
use MuseFx\Agglutinator\Languages\Hungarian\Affixes\Dative;
use MuseFx\Agglutinator\Languages\Hungarian\Affixes\Plural;
use MuseFx\Agglutinator\Languages\Hungarian\Affixes\Terminative;
use MuseFx\Agglutinator\Words\Noun as BaseNoun;

class Noun extends BaseNoun
{
    public function plural(string &$appliedAffix = null): self
    {
        $this->word = (new Plural($this->word))->apply($appliedAffix);
        return $this;
    }

    public function dative(string &$appliedAffix = null): self
    {
        $this->word = (new Dative($this->word))->apply($appliedAffix);
        return $this;
    }

    public function ablative(string &$appliedAffix = null): BaseNoun
    {
        $this->word = (new Ablative($this->word))->apply($appliedAffix);
        return $this;
    }

    public function terminative(string &$appliedAffix = null): BaseNoun
    {
        $this->word = (new Terminative($this->word))->apply($appliedAffix);
        return $this;
    }
}
