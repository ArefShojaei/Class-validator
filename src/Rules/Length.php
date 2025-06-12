<?php

namespace Validator\Rules;

use Attribute;
use Validator\Contracts\Enum\StringValidationMessage;
use Validator\Validations\ValidationProperty;


#[Attribute(Attribute::TARGET_PROPERTY)]
final class Length extends ValidationProperty {
    public function __construct(
        private int $min,
        private int $max,
        private string $message = ""
    ) {}

    public function isValid(mixed $value, object $object): bool {
        return (strlen($value) >= $this->min) && (strlen($value) <= $this->max) ? true : false;
    }

    public function getMessage(string $field, mixed $value): string {
        return !empty($this->message) ? $this->message : StringValidationMessage::Length->value;
    }
}