<?php

namespace Validator\Rules;

use Attribute;
use Validator\Contracts\Enum\StringValidationMessage;
use Validator\Validations\ValidationProperty;


#[Attribute(Attribute::TARGET_PROPERTY)]
final class IsDate extends ValidationProperty {
    public function __construct(
        private string $message = ""
    ) {}

    public function isValid(mixed $value, object $object): bool {
        return preg_match("/[0-9]{2,4}[\/\-][0-9]{1,2}[\/\-][0-9]{1,2}/", $value) ? true : false;
    }

    public function getMessage(string $field, mixed $value): string {
        return !empty($this->message) ? $this->message : StringValidationMessage::IsDate->value;
    }
}