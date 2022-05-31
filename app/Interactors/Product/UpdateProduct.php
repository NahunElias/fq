<?php

namespace App\Interactors\Product;

use App\Models\Product;
use App\Repositories\ProductRepository;

class UpdateProduct{

    private $productRepository;

    function __construct()
    {
        $this->productRepository = new ProductRepository();
    }

    public function execute($id, $productDto){

        $product = $this->productRepository->find($id);

        $product->fill($productDto);

        $this->productRepository->flush($product);

        return $product;
    }
}
