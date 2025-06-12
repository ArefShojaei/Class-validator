<?php

namespace Validator\Rules;

use Attribute;
use Validator\Contracts\Enum\ArrayValidationMessage;
use Validator\Validations\ValidationProperty;


#[Attribute(Attribute::TARGET_PROPERTY)]
final class NotContains extends ValidationProperty {
    public function __construct(
        private array $values,
        private string $message = ""
    ) {}

    public function isValid(mixed $array, object $object): bool {
        $result = [];
        
        foreach ($this->values as $value) if (in_array($value, $array)) $result[] = $value;
        
        return count($result) !== count($this->values) ? true : false;
    }

    public function getMessage(string $field, mixed $value): string {
        return !empty($this->message) ? $this->message : ArrayValidationMessage::NotContains->value;
    }
}