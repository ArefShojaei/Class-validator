<?php

namespace Validator\Rules;

use Attribute;
use Validator\Validations\ValidationProperty;


#[Attribute(Attribute::TARGET_PROPERTY)]
final class IsEmpty extends ValidationProperty {
    public function __construct(
        private string $message = ""
    ) {}

    public function isValid(mixed $value, object $object): bool {
        return empty($value) ? true : false;
    }

    public function getMessage(string $field, mixed $value): string {
        return !empty($this->message) ? $this->message : "Reading from Enum...";
    }
}