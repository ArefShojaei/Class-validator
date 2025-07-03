<?php

declare(strict_types=1);

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Tests\Entities\Product;
use Validator\Rules\IsArray;
use Validator\Rules\IsBoolean;
use Validator\Rules\IsNumber;
use Validator\Rules\IsString;


final class RuleValidatorTest extends TestCase {
    private Product $product;
    

    protected function setUp(): void {
        $this->product = new Product;
    }

    /**
     * @test
     */
    public function validateTitlePropertyThatBeString(): void {
        $this->product->title = "Book";
        
        $validationResult = (new IsString)->isValid($this->product->title, $this->product);
    
        $this->assertIsObject($this->product);
        $this->assertObjectHasProperty(propertyName:"title", object:$this->product);
        $this->assertIsString($this->product->title);
        $this->assertIsBool($validationResult);
        $this->assertTrue($validationResult);
    }

    /**
     * @test
     */
    public function validatePricePropertyThatBeNumber(): void {
        $this->product->price = 99;
        
        $validationResult = (new IsNumber)->isValid($this->product->price, $this->product);
    
        $this->assertIsObject($this->product);
        $this->assertObjectHasProperty(propertyName:"price", object:$this->product);
        $this->assertIsInt($this->product->price);
        $this->assertIsBool($validationResult);
        $this->assertTrue($validationResult);
    }

    /**
     * @test
     */
    public function validateCategoriesPropertyThatBeArray(): void {
        $this->product->categories = ["programming", "back-end"];
        
        $validationResult = (new IsArray)->isValid($this->product->categories, $this->product);
    
        $this->assertIsObject($this->product);
        $this->assertObjectHasProperty(propertyName:"categories", object:$this->product);
        $this->assertIsArray($this->product->categories);
        $this->assertIsBool($validationResult);
        $this->assertTrue($validationResult);
    }

    /**
     * @test
     */
    public function validateIsfreePropertyThatBeBoolean(): void {
        $this->product->isFree = false;
        
        $validationResult = (new IsBoolean)->isValid($this->product->isFree, $this->product);
    
        $this->assertIsObject($this->product);
        $this->assertObjectHasProperty(propertyName:"isFree", object:$this->product);
        $this->assertIsBool($this->product->isFree);
        $this->assertIsBool($validationResult);
        $this->assertTrue($validationResult);
    }

    # ----------------------------------------------
    # | More Rules will be as top logics to handle |
    # | these in validation process.               |
    # ----------------------------------------------
}