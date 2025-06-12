<?php

namespace Validator\Contracts\Interfaces;


interface Validator {
    public function validate(object $object): bool;
    public function getErrors(): array;
}