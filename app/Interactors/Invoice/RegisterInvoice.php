<?php

namespace App\Interactors\Invoice;

use App\Models\Invoice;
use App\Models\InvoiceProduct;
use App\Repositories\InvoiceRepository;
use Illuminate\Support\Arr;

class RegisterInvoice{

    private $invoiceRepository;

    function __construct()
    {
        $this->invoiceRepository = new InvoiceRepository();
    }

    public function execute($invoiceDto){

        $invoice = new Invoice();

        $invoice->fill($invoiceDto);

        $products = $invoiceDto['products'];

        $balance = 0;
        foreach ($products as $product){
            $balance += $product['price']*$product['quantity']; 
        }
        
        $invoice->balance = $balance;
        
        $this->invoiceRepository->create($invoice);

        $invoice->products()->attach($invoiceDto['products']);

        $invoice->customer;

        return $invoice;
    }
}
