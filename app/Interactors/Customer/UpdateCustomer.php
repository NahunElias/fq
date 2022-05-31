<?php

namespace App\Interactors\Customer;

use App\Repositories\CustomerRepository;

class UpdateCustomer{

    private $customerRepository;

    function __construct()
    {
        $this->customerRepository = new CustomerRepository();
    }

    public function execute($id, $customerDto){

        $customer = $this->customerRepository->find($id);

        $customer->fill($customerDto);

        $this->customerRepository->flush($customer);

        return $customer;
    }
}
