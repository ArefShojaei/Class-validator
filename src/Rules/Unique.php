<?php

namespace Validator\Rules;

use Attribute;
use Validator\Contracts\Enum\ArrayValidationMessage;
use Validator\Validations\ValidationProperty;


#[Attribute(Attribute::TARGET_PROPERTY)]
final class Unique extends ValidationProperty {
    public function __construct(
        private string $message = ""
    ) {}

    public function isValid(mixed $data, object $object): bool {
        $uniqueArray = array_unique($data);
        
        
        return count($uniqueArray) === count($data) ? true : false;
    }

    public function getMessage(string $field, mixed $value): string {
        return !empty($this->message) ? $this->message : ArrayValidationMessage::Unique->value;
    }
}