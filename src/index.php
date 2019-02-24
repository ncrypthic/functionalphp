<?php
namespace LLA\Functional;

use LLA\Functional\Option as FOption;
use LLA\Functional\Execute as FExecute;

function Maybe($value) {
    if($value === null) {
        return None();
    } else {
        return Some($value);
    }
}

function Some($value) {
    return new FOption\Some($value);
}

function None() {
    return new FOption\None();
}

function Execute($callback) {
    try {
        $result = call_user_func($callback);
        return $result;
    } catch(\Exception $exc) {
        return Failure($exc);
    }
}

function Success($value) {
    return new FExecute\Success($value);
}

function Failure($value) {
    return new FExecute\Failure($value);
}
