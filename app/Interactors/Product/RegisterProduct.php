<?php

namespace App\Interactors\Product;

use App\Models\Product;
use App\Repositories\ProductRepository;

class RegisterProduct{

    private $productRepository;

    function __construct()
    {
        $this->productRepository = new ProductRepository();
    }

    public function execute($productDto){

        $product = new Product();

        $product->fill($productDto);

        $this->productRepository->create($product);

        return $product;
    }
}
