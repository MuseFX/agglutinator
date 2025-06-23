<?php

namespace MuseFx\Agglutinator\Exceptions;

use Exception;

class LocaleNotFoundException extends Exception
{
    public function __construct(string $locale)
    {
        $message = "The locale `$locale` not found in classmap.";
        parent::__construct($message);
    }
}
