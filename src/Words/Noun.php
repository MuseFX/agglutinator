<?php

namespace MuseFx\Agglutinator\Words;

abstract class Noun extends Word
{
    abstract public function plural(): self;
    abstract public function dative(): self;
}
