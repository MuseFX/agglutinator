<?php

namespace MuseFx\Agglutinator\Languages\Hungarian;

use MuseFx\Agglutinator\Languages\Hungarian\Cases\Dative;
use MuseFx\Agglutinator\WordBuilder;

class Hungarian extends WordBuilder
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
