<?php

namespace Validator\Contracts\Enum;


enum GeneralValidationMessage: string {
    case Required = "The field is required!";
    case IsNull = "The Value must be null!";
}