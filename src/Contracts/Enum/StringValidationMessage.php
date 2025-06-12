<?php

namespace Validator\Contracts\Enum;


enum StringValidationMessage: string {
    case IsEmail = "Invalid Email address!";
    case IsEmpty = "The field must be empty!";
    case IsNotEmpty = "The field must not be empty!";
    case Equals = "The Value must equal the specified value!";
    case NotEquals = "The Value must not equal the specified value!";
    case IsIn = "The Value must be one of the specified options!";
    case IsNotIn = "The Value must not be one of the specified options!";
    case IsJSON = "The Value must be a valid JSON object!";
    case IsLowercase = "The Value must be in lowercase!";
    case IsUppercase = "The Value must be in lowercase!";
    case IsString = "The Value must be in uppercase!";
    case IsUrl = "The Value must be a valid URL!";
    case Length = "The Value must have the specified length!";
    case Max = "The Value must not exceed the maximum limit.!";
    case Min = "The Value must meet or exceed the minimum limit!";
}