<?php

namespace MuseFx\Agglutinator\Words;

abstract class Noun extends Word
{
    abstract public function plural(string &$appliedAffix = null): self;
    abstract public function dative(string &$appliedAffix = null): self;
    abstract public function ablative(string &$appliedAffix = null): self;
    abstract public function terminative(string &$appliedAffix = null): self;
}
