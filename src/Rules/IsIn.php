<?php

namespace Validator\Rules;

use Attribute;
use Validator\Validations\ValidationProperty;


#[Attribute(Attribute::TARGET_PROPERTY)]
final class IsIn extends ValidationProperty {
    public function __construct(
        private array $values,
        private string $message = ""
    ) {}

    public function isValid(mixed $content, object $object): bool {
        $result = [];
        
        foreach ($this->values as $value) if (str_contains($content, $value)) $result[] = $value;
        
        return count($result) === count($this->values) ? true : false;
    }

    public function getMessage(string $field, mixed $value): string {
        return !empty($this->message) ? $this->message : "Reading from Enum...";
    }
}