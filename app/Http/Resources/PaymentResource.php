<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'expedition_date' => $this->expedition_date,
            'value' => $this->value,
            'balance' => $this->balance,
            'invoice_id' => $this->invoice_id
        ];
    }
}
