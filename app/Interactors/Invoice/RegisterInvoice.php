<?php

namespace App\Interactors\Invoice;

use App\Models\Invoice;
use App\Repositories\InvoiceRepository;

class RegisterInvoice{

    private $invoiceRepository;

    function __construct()
    {
        $this->invoiceRepository = new InvoiceRepository();
    }

    public function execute($invoiceDto){

        $invoice = new Invoice();

        $invoice->fill($invoiceDto);
        
        $this->invoiceRepository->create($invoice);

        $invoice->products()->attach($invoiceDto['products']);

        $invoice->customer;

        return $invoice;
    }
}
