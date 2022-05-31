<?php

namespace App\Interactors\Customer;

use App\Models\Customer;
use App\Repositories\CustomerRepository;

class RegisterCustomer{

    private $customerRepository;

    function __construct()
    {
        $this->customerRepository = new CustomerRepository();
    }

    public function execute($customerDto){

        $customer = new Customer();

        $customer->fill($customerDto);

        $this->customerRepository->create($customer);

        return $customer;
    }
}
