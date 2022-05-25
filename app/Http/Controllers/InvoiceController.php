<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function invoiceRegister(Request $request)
    {

        $invoice = Invoice::create($request->all());

        if ($request->products) {
            $invoice->products()->attach($request->products);
        }
        $request->customer;

        return $this->sendResponse($invoice, 'Invoice saved successfully');
    }

    public function updateCustomer(Request $request, Invoice $invoice)
    {

        $invoice = Invoice::where('id', $request->id)->update(array('customer_id' => $request->customer_id));

        return $this->sendResponse($invoice, 'Invoice update successfully');
    }

    public function addProduct(Request $request)
    {
        $invoice = Invoice::where('id', $request->id);

        $invoice->products()->attach($request->products);

        return $this->sendResponse($invoice, 'Product saved successfully');
    }

    public function deleteProduct(Request $request)
    {
        $invoice = Invoice::where('id', $request->id);

        $invoice->products()->detach($request->product_id);
        
        return $this->sendResponse($invoice, 'Product deleted successfully');
    }
}
