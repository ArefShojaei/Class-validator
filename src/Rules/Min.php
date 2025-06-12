<?php

namespace Validator\Rules;

use Attribute;
use Validator\Contracts\Enum\StringValidationMessage;
use Validator\Validations\ValidationProperty;


#[Attribute(Attribute::TARGET_PROPERTY)]
final class Min extends ValidationProperty {
    public function __construct(
        private int $length,
        private string $message = ""
    ) {}

    public function isValid(mixed $value, object $object): bool {
        return (strlen($value) <= $this->length) ? true : false;
    }

    public function getMessage(string $field, mixed $value): string {
        return !empty($this->message) ? $this->message : StringValidationMessage::Min->value;
    }
}