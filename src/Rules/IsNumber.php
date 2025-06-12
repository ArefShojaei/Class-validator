<?php

namespace Validator\Rules;

use Attribute;
use Validator\Contracts\Enum\NumberValidationMessage;
use Validator\Validations\ValidationProperty;


#[Attribute(Attribute::TARGET_PROPERTY)]
final class IsNumber extends ValidationProperty {
    public function __construct(
        private string $message = ""
    ) {}

    public function isValid(mixed $value, object $object): bool {
        return is_int($value) ? true : false;
    }

    public function getMessage(string $field, mixed $value): string {
        return !empty($this->message) ? $this->message : NumberValidationMessage::IsNumber->value;
    }
}