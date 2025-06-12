<?php

namespace Validator\Rules;

use Attribute;
use Validator\Validations\ValidationProperty;


#[Attribute(Attribute::TARGET_PROPERTY)]
final class IsInstance extends ValidationProperty {
    public function __construct(
        private string $class,
        private string $message = ""
    ) {}

    public function isValid(mixed $value, object $object): bool {
        return $value instanceof $this->class ? true : false;
    }

    public function getMessage(string $field, mixed $value): string {
        return !empty($this->message) ? $this->message : "Reading from Enum...";
    }
}