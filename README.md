<h1 align="center">Class Validator</h1>


```php
<?php

use Validator\Validator;
use Validator\Rules\{
    Required,
    IsEmail,
    IsNumber,
    Max,
    IsPositive,
    IsString,
};


class User {
    #[IsString]
    #[Required]
    public string $name;

    #[IsEmail]
    #[Required]
    public string $email;

    #[IsPositive]
    #[Max(2)]
    #[IsNumber]
    #[Required]
    public int $age;
}

$user = new User;

$user->name = "Aref";
$user->email = false; # Error
$user->age = 31;

$validator = new Validator;

$isValidUser = $validator->validate($user);

if (!$isValidUser) print_r($validator->getErrors());

echo "[INFO] The User is valid";

# Validation errors:
    // Array
    // (
    //     [email] => Array
    //         (
    //             [IsEmail] => Invalid Email address!
    //         )

    // )
```