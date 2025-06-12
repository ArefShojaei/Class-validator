<?php

namespace Validator\Contracts\Enum;


enum BooleanValidationMessage: string {
    case IsBoolean = "The value must be a boolean!";
}