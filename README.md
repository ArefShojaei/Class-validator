# Class Validator for PHP
[![Ask DeepWiki](https://devin.ai/assets/askdeepwiki.png)](https://deepwiki.com/ArefShojaei/Class-validator)

A simple, lightweight, and powerful validation library for PHP 8+ classes using attributes.

## Installation

### Using Composer
```bash
composer require arefshojaei/class-validator
```

### Using Git
```bash
git clone https://github.com/ArefShojaei/Class-validator.git
```

## Basic Usage

Define your validation rules directly on your class properties using PHP 8 attributes.

### 1. Define your Class with Validation Rules

```php
<?php

use Validator\Rules\{
    Required,
    IsEmail,
    IsNumber,
    IsPositive,
    IsString,
    Length
};

class User
{
    #[IsString]
    #[Required]
    #[Length(min: 2, max: 50)]
    public string $name;

    #[IsEmail]
    #[Required]
    public string $email;

    #[IsPositive]
    #[IsNumber]
    #[Required]
    public int $age;
}
```

### 2. Validate an Instance of the Class

Instantiate your class, create a `Validator` object, and call the `validate()` method.

```php
<?php

use Validator\Validator;

$user = new User;

$user->name = "Aref";
$user->email = "this-is-not-an-email"; // Invalid value
$user->age = 31;

$validator = new Validator;
$isValid = $validator->validate($user);

if (!$isValid) {
    print_r($validator->getErrors());
} else {
    echo "The user object is valid!";
}
```

### 3. Get Validation Errors

If validation fails, the `getErrors()` method will return an associative array of errors.

**Output:**
```
Array
(
    [email] => Array
        (
            [IsEmail] => Invalid Email address!
        )
)
```

## Available Rules

The library provides a comprehensive set of validation rules.

| Rule | Parameters | Description |
| --- | --- | --- |
| `Contains` | `array $values` | Checks if the property (array) contains all the specified values. |
| `Count` | `int $size` |  Validates that an array has an exact number of elements. |
| `Equals` | `string $expected` | Checks if the property's value is strictly equal to the given value. |
| `IsArray` | | Checks if the property is an array. |
| `IsBoolean` | | Checks if the property is a boolean. |
| `IsDate` | | Checks if the property is a valid date string (`YYYY-MM-DD`, `YYYY/MM/DD`). |
| `IsEmail` | | Checks if the property is a valid Gmail address. |
| `IsEmpty` | | Checks if the property is empty (e.g., `""`, `0`, `[]`, `null`). |
| `IsIn` | `array $values` | Checks if the property's string value contains all substrings from the given array. |
| `IsInstance` | `string $class` | Checks if the property is an instance of a given class. |
| `IsJSON` | | Checks if the property is a valid JSON string. |
| `IsLowercase` | | Checks if all characters in the string are lowercase. |
| `IsNegative` | | Checks if the numeric property is a negative number (or zero). |
| `IsNotEmpty` | | Checks if the property is not empty. |
| `IsNotIn` | `array $values` | Checks if the property's string value does not contain the substrings from the given array. |
| `IsNull` | | Checks if the property is `null`. |
| `IsNumber` | | Checks if the property is an integer. |
| `IsObject` | | Checks if the property is an object. |
| `IsPositive` | | Checks if the numeric property is a positive number (greater than zero). |
| `IsString` | | Checks if the property is a string. |
| `IsUppercase` | | Checks if all characters in the string are uppercase. |
| `IsUrl` | | Checks if the property is a valid URL. |
| `Length` | `int $min, int $max` | Checks if the string length is between a `min` and `max` value (inclusive). |
| `Max` | `int $length` | Checks if the string length is less than or equal to a maximum value. |
| `Min` | `int $length` | Checks if the string length is greater than or equal to a minimum value. |
| `NotContains` | `array $values` | Checks if the property (array) does not contain the specified values. |
| `NotEquals` | `string $expected` | Checks if the property's value is not strictly equal to the given value. |
| `Required` | | Checks that the property has been set (is not `unset`). |
| `Unique` | | Checks if all values in an array are unique. |


## Custom Error Messages

You can override the default error message for any rule by passing it as the `message` argument.

```php
<?php

use Validator\Rules\Required;
use Validator\Rules\IsEmail;

class User
{
    #[Required(message: "Please enter your name.")]
    public string $name;
    
    #[IsEmail(message: "The email you entered is not valid.")]
    #[Required(message: "Email is a required field.")]
    public string $email;
}
```

## Static Validation

For quick, one-off validations without the context of a class, you can call validation rules statically.

- If the validation passes, it returns `true`.
- If the validation fails, it returns the error message string.

```php
<?php

use Validator\Validator;

// Successful validation
$result1 = Validator::isEmail('test@gmail.com');
var_dump($result1); // bool(true)

// Failed validation
$result2 = Validator::isEmail('invalid-email');
var_dump($result2); // string(22) "Invalid Email address!"

// Validation with parameters
$result3 = Validator::length('short', 10, 20);
var_dump($result3); // string(40) "The Value must have the specified length!"
```

## License

This project is licensed under the MIT License.
