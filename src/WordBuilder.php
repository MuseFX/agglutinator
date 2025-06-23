<?php

namespace MuseFx\Agglutinator;

abstract class WordBuilder
{
    protected string $word;

    abstract public function plural(): self;
    abstract public function dative(): self;

    public function __construct(string $word)
    {
        $this->word = $word;
    }

    public function toString(): string
    {
        return $this->word;
    }

    public function __toString(): string
    {
        return $this->toString();
    }
}
