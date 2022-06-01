<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceProduct extends Model
{
    use HasFactory;

    protected $table = 'invoices_products';

    protected $fillable = [
        'quantity',
        'price',
        'product_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function invoices(){
        return $this->hasMany(Invoice::class);
    }
}
