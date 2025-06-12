<?php

namespace Validator;

use ReflectionClass;
use stdClass;
use Validator\Contracts\Interfaces\Validator as IValidator;
use Validator\Exceptions\RuleNotExists;


/**
 * @method static string|bool contains(array $haystack, array $includes, string $message = "")
 * @method static string|bool count(array $haystack, int $size, string $message = "")
 * @method static string|bool equals(string $value, string $actual, string $message = "")
 * @method static string|bool isArray(array $haystack, string $message = "")
 * @method static string|bool IsBoolean(bool $state, string $message = "")
 * @method static string|bool isDate(string $date, string $message = "")
 * @method static string|bool isEmail(string $email, string $message = "")
 * @method static string|bool isEmpty(array|string $value, string $message = "")
 * @method static string|bool isIn(string $value, array $haystack, string $message = "")
 * @method static string|bool isInstance(object|string $actual, object|string $expected, string $message = "")
 * @method static string|bool isJSON(string $json, string $message = "")
 * @method static string|bool isLowercase(string $value, string $message = "")
 * @method static string|bool isNegative(int $value, string $message = "")
 * @method static string|bool isNotEmpty(array|string $value, string $message = "")
 * @method static string|bool isNotIn(string $value, array $haystack, string $message = "")
 * @method static string|bool isNull(string $value, string $message = "")
 * @method static string|bool isNumber(string $value, string $message = "")
 * @method static string|bool isObject(object $actual, string $message = "")
 * @method static string|bool isPositive(int $value, string $message = "")
 * @method static string|bool isString(string $value, string $message = "")
 * @method static string|bool isUppercase(string $value, string $message = "")
 * @method static string|bool isUrl(string $url, string $message = "")
 * @method static string|bool length(string $value, int $min, int $max, string $message = "")
 * @method static string|bool max(string $value, int $length, string $message = "")
 * @method static string|bool min(string $value, int $length, string $message = "")
 * @method static string|bool notContains(array $haystack, array $includes, string $message = "")
 * @method static string|bool notEquals(string $value, string $actual, string $message = "")
 * @method static string|bool required(mixed $value, string $message = "")
 */
final class Validator implements IValidator {
    private const RULES_NAMESPACE = __NAMESPACE__ . "\\Rules\\";

    private array $errors = [];


    public function validate(object|string $class): bool {
        $reflection = new ReflectionClass($class);

        foreach ($reflection->getProperties() as $property) {
            $property->setAccessible(true);
            
            $value = $property->getValue($class);

            foreach ($property->getAttributes() as $attribute) {
                $parsedNamespace = explode("\\", $attribute->getName());

                $action = end($parsedNamespace);

                $validator = $attribute->newInstance();

                if (!$validator->isValid($value, $class)) {
                    $this->errors[$property->getName()][$action] = $validator->getMessage(
                        $property->getName(),
                        $value
                    );
                }
            }
        }

        return empty($this->errors);
    }

    public function getErrors(): array {
        return $this->errors;
    }

    public static function __callStatic(string $name, array $params) {
        $rule = ucfirst($name);

        $class = self::RULES_NAMESPACE . $rule;

        if (!class_exists($class)) throw new RuleNotExists("The \"{$rule}\" method is not supported!");

        $value = array_shift($params);

        $instance = new $class(...$params);

        return $instance->isValid($value, new stdClass) ? true : $instance->getMessage($rule, $value);
    }
}