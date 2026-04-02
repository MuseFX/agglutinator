## Agglutinator

#### Currently available languages
- hu

#### Currently available suffixes / affixes
- Nouns
  - plural()
  - dative()
  - ablative()
  - terminative()

### Usage

```php
<?php

use MuseFx\Agglutinator\Agglutinator;

$agglutinator = new Agglutinator('hu');

$randomNoun = 'ló';
$str = "Ajándék {$agglutinator->createNoun($randomNoun)->dative()} ne nézd a fogát!";
// "Ajándék lónak ne nézd a fogát!"

$from = 'hétfő';
$to = 'szerda';
$str = "A héten {$agglutinator->createNoun($from)->ablative()} {$agglutinator->createNoun($to)->terminative()} üzleti úton vagyok.";
// "A héten hétfőtől szerdáig üzleti úton vagyok."
