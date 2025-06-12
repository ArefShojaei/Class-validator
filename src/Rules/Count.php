<?php

namespace Validator\Rules;

use Attribute;
use Validator\Contracts\Enum\ArrayValidationMessage;
use Validator\Validations\ValidationProperty;


#[Attribute(Attribute::TARGET_PROPERTY)]
final class Count extends ValidationProperty {
    public function __construct(
        private int $size,
        private string $message = ""
    ) {}

    public function isValid(mixed $array, object $object): bool {
        return count($array) === $this->size ? true : false;
    }

    public function getMessage(string $field, mixed $value): string {
        return !empty($this->message) ? $this->message : ArrayValidationMessage::Count->value;
    }
}