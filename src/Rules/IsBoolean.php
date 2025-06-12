<?php

namespace Validator\Rules;

use Attribute;
use Validator\Contracts\Enum\BooleanValidationMessage;
use Validator\Validations\ValidationProperty;


#[Attribute(Attribute::TARGET_PROPERTY)]
final class IsBoolean extends ValidationProperty {
    public function __construct(
        private string $message = ""
    ) {}

    public function isValid(mixed $value, object $object): bool {
        return is_bool($value) ? true : false;
    }

    public function getMessage(string $field, mixed $value): string {
        return !empty($this->message) ? $this->message : BooleanValidationMessage::IsBoolean->value;
    }
}