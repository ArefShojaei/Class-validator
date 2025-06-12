<?php

namespace Validator\Rules;

use Attribute;
use Validator\Contracts\Enum\NumberValidationMessage;
use Validator\Validations\ValidationProperty;


#[Attribute(Attribute::TARGET_PROPERTY)]
final class IsPositive extends ValidationProperty {
    private const ZERO_NUMBER = 0;
    
    public function __construct(
        private string $message = ""
    ) {}

    public function isValid(mixed $value, object $object): bool {
        return $value > self::ZERO_NUMBER ? true : false;
    }

    public function getMessage(string $field, mixed $value): string {
        return !empty($this->message) ? $this->message : NumberValidationMessage::IsPositive->value;
    }
}