<?php

namespace Validator\Rules;

use Attribute;
use Validator\Validations\ValidationProperty;


#[Attribute(Attribute::TARGET_PROPERTY)]
final class NotEquals extends ValidationProperty {
    public function __construct(
        private string $expected,
        private string $message = ""
    ) {}

    public function isValid(mixed $actual, object $object): bool {
        return $actual !== $this->expected ? true : false;
    }

    public function getMessage(string $field, mixed $value): string {
        return !empty($this->message) ? $this->message : "Reading from Enum...";
    }
}