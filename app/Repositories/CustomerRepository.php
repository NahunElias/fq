<?php
namespace App\Repositories;

use App\Models\Customer;

class CustomerRepository extends Repository{

    function __construct(){
        parent::__construct(new Customer());
    }
}