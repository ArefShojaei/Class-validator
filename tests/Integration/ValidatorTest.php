<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Tests\Validators\Product;
use Validator\Validator;


final class ValidatorTest extends TestCase {
    private Validator $validator;

    protected function setUp(): void {
        $this->validator = new Validator;
    }

    /**
     * @test
     */
    public function validateProductValidator(): void {
        $product = new Product;
        
        $product->title = "Book";
        $product->price = 99;
        $product->categories = ["programming", "back-end"];
        $product->isFree = false;

        $validationResult = $this->validator->validate($product);

        $this->assertIsBool($validationResult);
        $this->assertTrue($validationResult);
    }

    /**
     * @test
     */
    public function validateProductValidatorWithFailedValidation(): void {
        $product = new Product;
        
        $product->title = "Book";

        $validationResult = $this->validator->validate($product);

        $errors = $this->validator->getErrors();

        $this->assertIsBool($validationResult);
        $this->assertFalse($validationResult);
        $this->assertIsArray($errors);
        $this->assertCount(expectedCount:3, haystack:$errors);
    }
}