<?php

namespace Validator\Rules;

use Attribute;
use Validator\Validations\ValidationProperty;


#[Attribute(Attribute::TARGET_PROPERTY)]
final class IsUppercase extends ValidationProperty {
    public function __construct(
        private string $message = ""
    ) {}

    public function isValid(mixed $value, object $object): bool {
        return ctype_upper($value) ? true : false;
    }

    public function getMessage(string $field, mixed $value): string {
        return !empty($this->message) ? $this->message : "Reading from Enum...";
    }
}