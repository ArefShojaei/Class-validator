<?php

namespace Validator;

use ReflectionClass;
use Validator\Contracts\Interfaces\Validator as IValidator;


final class Validator implements IValidator {
    private array $errors = [];

    public function validate(object $object): bool {
        $reflection = new ReflectionClass($object);

        foreach ($reflection->getProperties() as $property) {
            $property->setAccessible(true);
            
            $value = $property->getValue($object);

            foreach ($property->getAttributes() as $attribute) {
                $parsedNamespace = explode("\\", $attribute->getName());

                $action = strtolower(end($parsedNamespace));

                $validator = $attribute->newInstance();

                if (!$validator->isValid($value, $object)) {
                    $this->errors[$property->getName()][$action] = $validator->getMessage(
                        $property->getName(),
                        $value
                    );
                }
            }
        }

        return empty($this->errors);
    }

    public function getErrors(): array {
        return $this->errors;
    }
}