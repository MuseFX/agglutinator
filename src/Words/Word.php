<?php

namespace MuseFx\Agglutinator\Words;

abstract class Word
{
    protected string $word;

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
