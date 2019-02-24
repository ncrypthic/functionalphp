Functional PHP
==============

Installation
------------

```
$ composer require ncrypthic/functionalphp
```

Usage
-----

1. Monads
  1.1 [Option](Option)
  1.2 [Execute](Execute)
  1.3 [Match](Match)

Option
------

```
<?php
use LLA\Functional\Maybe;
use LLA\Functional\Some;
use LLA\Functional\None;

// ...
// $val = <someValue>
$maybeNull = Maybe($val)->match()
  ->case(Some(1), function($val) {
  })
  ->case(None(), function($val) {
  })
  ->val();
```

Execute
-------

```
<?php
use LLA\Functional\Execute;
use LLA\Functional\Success;
use LLA\Functional\Failure;

// ...
// $callable = <someValue>
$tryExecute = Execute($callable)->match()
  ->case(Success(1), function($val) {
  })
  ->case(Failure(), function($val) {
  })
  ->val();
```
