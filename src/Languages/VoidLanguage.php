<?php

namespace MuseFx\Agglutinator\Languages;

use MuseFx\Agglutinator\WordBuilder;

class VoidLanguage extends WordBuilder
{
    public function dative(): WordBuilder
    {
        return $this;
    }
}
