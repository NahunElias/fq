<?php

namespace App\Http\Controllers;

use App\Http\Resources\PaymentResource;
use App\Interactors\Payment\RegisterPayment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function registerPayment(Request $request)
    {
        $registerPayment = new RegisterPayment;

        $payment = $registerPayment->execute($request->all());

        return ($payment);
    }
}
