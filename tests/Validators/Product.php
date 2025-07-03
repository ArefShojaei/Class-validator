<?php

namespace Tests\Validators;

use Validator\Rules\{
    Count,
    IsArray,
    IsBoolean,
    IsNumber,
    IsString,
    Required,
};


final class Product {
    #[IsString]
    #[Required]
    public $title;
    
    #[IsNumber]
    #[Required]
    public $price;
    
    #[IsArray]
    public $categories;
    
    #[IsBoolean]
    public $isFree;   
}