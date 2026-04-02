<?php

namespace MuseFx\Agglutinator\Languages\Void\Words;

use MuseFx\Agglutinator\Words\Noun as BaseNoun;

class Noun extends BaseNoun
{
    public function plural(?string &$appliedAffix = null): BaseNoun
    {
        return $this;
    }

    public function dative(?string &$appliedAffix = null): BaseNoun
    {
        return $this;
    }

    public function ablative(?string &$appliedAffix = null): BaseNoun
    {
        return $this;
    }

    public function terminative(?string &$appliedAffix = null): BaseNoun
    {
        return $this;
    }
}
