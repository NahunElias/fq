<?php

namespace App\Http\Resources;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $customer = $this->whenLoaded('customers');
        $products = $this->whenLoaded('products');

        return [
            'code' => $this->id,
            'expedition_date' => $this->expedition_date,
            'customer' => $this->customer,
            'products' => $this->products
        ];
    }
}
