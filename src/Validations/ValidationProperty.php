<?php

namespace Validator\Validations;

use Attribute;


#[Attribute(Attribute::TARGET_PROPERTY)]
abstract class ValidationProperty {
    abstract public function isValid(mixed $value, object $object): bool;
    
    abstract public function getMessage(string $field, mixed $value): string;
}