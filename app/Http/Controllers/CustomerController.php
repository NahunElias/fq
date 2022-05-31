<?php

namespace App\Http\Controllers;

use App\Http\Requests\Customer\StoreCustomerRequest;
use App\Http\Requests\Customer\UpdateCustomerRequest;
use App\Http\Resources\CustomerResource;
use App\Interactors\Customer\RegisterCustomer;
use App\Interactors\Customer\UpdateCustomer;
use App\Models\Customer;
use App\Repositories\CustomerRepository;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customerRepository = new CustomerRepository();
        return CustomerResource::collection($customerRepository->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerRequest $request)
    {
        $registerCustomer = new RegisterCustomer();

        $customer = $registerCustomer->execute($request->all());

        return (new CustomerResource($customer))
            ->additional(['msg' => 'Cliente registrado correcto']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return new CustomerResource($customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $updateCustomer = new UpdateCustomer();

        $customer = $updateCustomer->execute($customer->id, $request->all());

        return (new CustomerResource($customer))
            ->additional(['msg' => 'Cliente actualizado correctamente']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return (new CustomerResource($customer))
            ->additional(['msg' => 'Cliente eliminado correctamente']);
    }
}
