<?php

namespace App\Http\Controllers;

use App\Http\Requests\Invoice\StoreInvoiceRequest;
use App\Http\Resources\InvoiceResource;
use App\Interactors\Invoice\RegisterInvoice;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class InvoiceController extends Controller
{
    public function invoiceRegister(StoreInvoiceRequest $request)
    {
        $registerInvoice = new RegisterInvoice();

        $invoice = $registerInvoice->execute($request->all());

        return (new InvoiceResource($invoice))
            ->additional(['msg' => 'Factura creada con exito']);
    }

    public function index()
    {
        return Invoice::all()->load('customer', 'products');
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
