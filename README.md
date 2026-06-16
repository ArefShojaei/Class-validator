<div align="center">
    <h1>🛡️ Class Validator for PHP</h1>

<p>
    A lightweight, powerful, and modern PHP 8+ validation library that uses 
    <strong>Attributes</strong> to define validation rules directly inside your classes.
</p>

[![PHP Version](https://img.shields.io/badge/PHP-8%2B-blue.svg)](https://php.net)
[![License](https://img.shields.io/badge/license-MIT-green.svg)](LICENSE)
[![Packagist](https://img.shields.io/badge/Packagist-Class--Validator-orange.svg)](https://packagist.org/packages/arefshojaei/class-validator)

</div>

---

## ✨ Features

* 🏷️ Attribute-based validation using native PHP 8 attributes
* 🧩 Validate entire objects and class properties
* 📝 Custom error messages for every validation rule
* ⚡ Static validation methods for quick checks
* 📦 Simple Composer installation
* 🪶 Lightweight with zero unnecessary dependencies
* 🔒 Strongly typed and modern PHP syntax
* 🛠️ Easy to extend with custom validation rules

---

## 📥 Installation

### Install using Composer

```bash
composer require arefshojaei/class-validator
```

### Clone from GitHub

```bash
git clone https://github.com/ArefShojaei/Class-validator.git
cd Class-validator
```

---

## 🚀 Quick Start

### 1. Create a DTO or Entity with Validation Attributes

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

    #[Required]
    #[IsEmail]
    public string $email;

    #[Required]
    #[IsNumber]
    #[IsPositive]
    public int $age;
}
```

---

### 2. Validate the Object

```php
use Validator\Validator;

$user = new User();

$user->name = "Aref";
$user->email = "invalid-email";
$user->age = 31;

$validator = new Validator();

$isValid = $validator->validate($user);

if (!$isValid) {
    print_r($validator->getErrors());
}
```

Output:

```txt
Array
(
    [email] => Array
        (
            [IsEmail] => Invalid Email address!
        )
)
```

---

## 🧩 Available Validation Rules

### String Rules

| Rule        | Description                                 |
| ----------- | ------------------------------------------- |
| IsString    | Checks if the value is a string             |
| Length      | Validates minimum and maximum string length |
| Min         | Checks minimum string length                |
| Max         | Checks maximum string length                |
| IsLowercase | Checks lowercase strings                    |
| IsUppercase | Checks uppercase strings                    |
| Equals      | Checks exact equality                       |
| NotEquals   | Checks inequality                           |

---

### Number Rules

| Rule       | Description                     |
| ---------- | ------------------------------- |
| IsNumber   | Checks if the value is a number |
| IsPositive | Checks positive numbers         |
| IsNegative | Checks negative numbers         |

---

### Collection Rules

| Rule        | Description                                |
| ----------- | ------------------------------------------ |
| IsArray     | Validates arrays                           |
| Count       | Checks array size                          |
| Contains    | Checks if an array contains values         |
| NotContains | Checks if an array does not contain values |
| Unique      | Ensures all array values are unique        |

---

### Type & State Rules

| Rule       | Description                        |
| ---------- | ---------------------------------- |
| Required   | Checks whether a property exists   |
| IsNull     | Checks null values                 |
| IsNotEmpty | Checks that the value is not empty |
| IsEmpty    | Checks empty values                |
| IsBoolean  | Validates booleans                 |
| IsObject   | Validates objects                  |
| IsInstance | Checks object instance type        |

---

### Format Rules

| Rule    | Description               |
| ------- | ------------------------- |
| IsEmail | Validates email addresses |
| IsUrl   | Validates URLs            |
| IsDate  | Validates date formats    |
| IsJSON  | Validates JSON strings    |
| IsIn    | Checks allowed values     |
| IsNotIn | Checks forbidden values   |

---

## 🎨 Custom Error Messages

Override default validation messages:

```php
use Validator\Rules\Required;
use Validator\Rules\IsEmail;

class User
{
    #[Required(message: "Name is required.")]
    public string $name;

    #[Required(message: "Email is required.")]
    #[IsEmail(message: "Please enter a valid email address.")]
    public string $email;
}
```

---

## ⚡ Static Validation

Use validation rules without creating a class:

```php
use Validator\Validator;

Validator::isEmail("test@gmail.com");
// true

Validator::isEmail("invalid-email");
// "Invalid Email address!"

Validator::length("Hello", 10, 20);
// "The value must have the specified length!"
```

---

## 💡 Example Use Cases

This library is useful for:

* Request DTO validation
* API input validation
* Configuration validation
* Domain entities validation
* Form data validation
* Command-line input validation

---

## 🔥 Why Class Validator?

Unlike traditional validation approaches that separate rules from data, Class Validator keeps validation rules close to your class properties using PHP Attributes.

This provides:

* Better readability
* Cleaner architecture
* Less duplicated code
* Better IDE support
* More maintainable applications

---

## 🤝 Contributing

Contributions are welcome.

1. Fork the repository
2. Create a feature branch:

```bash
git checkout -b feature/amazing-feature
```

3. Commit your changes:

```bash
git commit -m "Add amazing feature"
```

4. Push your branch:

```bash
git push origin feature/amazing-feature
```

5. Open a Pull Request.

---

## 👨‍💻 Author

**Aref Shojaei**
- 📧 Email: [arefshojaei82@gmail.com](mailto:arefshojaei82@gmail.com)
- 🐙 GitHub: [@ArefShojaei](https://github.com/ArefShojaei)
- 📦 Packagist: [arefshojaei/class-validator](https://packagist.org/packages/arefshojaei/class-validator)

---

## ⭐ Show Your Support

If this project helps your PHP development workflow, consider giving it a **Star ⭐** on GitHub.

Your support helps the project grow.
