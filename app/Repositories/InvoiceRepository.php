<?php
namespace App\Repositories;

use App\Models\Invoice;

class InvoiceRepository extends Repository{

    function __construct(){
        parent::__construct(new Invoice());
    }
}