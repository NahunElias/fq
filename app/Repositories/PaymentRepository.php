<?php
namespace App\Repositories;

use App\Models\Payment;

class PaymentRepository extends Repository{

    function __construct(){
        parent::__construct(new Payment());
    }
}