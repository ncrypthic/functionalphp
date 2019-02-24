# Functional PHP

## Installation

```
$ composer require ncrypthic/functionalphp
```

## Usage

1. Monads
    1. [Option](#option)
    2. [Execute](#execute)
    3. [Match](#match)

## Option

```php
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

## Execute

```php
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

## Match

```php
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
