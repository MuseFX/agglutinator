<?php

namespace MuseFx\Agglutinator\Languages\Void\Words;

use MuseFx\Agglutinator\Words\Noun as BaseNoun;

class Noun extends BaseNoun
{
    public function plural(): self
    {
        return $this;
    }

    public function dative(): self
    {
        return $this;
    }
}
