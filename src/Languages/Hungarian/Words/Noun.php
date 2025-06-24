<?php

namespace MuseFx\Agglutinator\Languages\Hungarian\Words;

use MuseFx\Agglutinator\Languages\Hungarian\Affixes\Dative;
use MuseFx\Agglutinator\Words\Noun as BaseNoun;

class Noun extends BaseNoun
{
    public function plural(): self
    {
        return $this;
    }

    public function dative(): self
    {
        $this->word = (new Dative($this->word))->apply();
        return $this;
    }
}
