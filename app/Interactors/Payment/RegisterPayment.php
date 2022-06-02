<?php

namespace App\Interactors\Payment;

use App\Models\Payment;
use App\Repositories\PaymentRepository;

class RegisterPayment{

    private $paymentRepository;

    function __construct()
    {
        $this->paymentRepository = new PaymentRepository();
    }

    public function execute($paymentDto){

        $payment = new Payment();

        $payment->fill($paymentDto);

        if(!($payment->invoice->balance >= $payment['value'])){
            return ['No se pudo realizar el pago'];
        }
        
        $this->paymentRepository->create($payment);

        $payment->invoice->balance -= $payment['value'];  

        $payment->invoice->save();

        return $payment;
    }
}
