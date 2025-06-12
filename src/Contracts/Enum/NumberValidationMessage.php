<?php

namespace Validator\Contracts\Enum;


enum NumberValidationMessage: string {
    case IsNumber = "The value must be a number!";
    case IsNegative = "The value must be a negetive number!";
    case IsPositive = "The value must be a positive number!";
}