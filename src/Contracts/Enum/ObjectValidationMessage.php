<?php

namespace Validator\Contracts\Enum;


enum ObjectValidationMessage: string {
    case IsInstance = "The Value must be an instance of the specified type!";
}