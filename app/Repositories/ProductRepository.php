<?php
namespace App\Repositories;
use App\Models\Product;

class ProductRepository extends Repository{

    function __construct(){
        parent::__construct(new Product());
    }
}