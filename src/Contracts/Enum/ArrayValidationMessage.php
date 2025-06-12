<?php

namespace Validator\Contracts\Enum;


enum ArrayValidationMessage: string {
    case Contains = "The Value must contain the specified substring!";
    case NotContains = "The must not contain the specified substring!";
    case Count = "The must must have a count matching the specified requirement!";
    case IsArray = "The value must be an array!";
    case Unique = "The value must be a unique array!";
}