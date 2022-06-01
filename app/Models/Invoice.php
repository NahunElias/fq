<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'expedition_date',
        'customer_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public static $rules = [
        'code' => 'required',
        'expedition_date' => 'required',
        'customer_id' => 'required'
    ];

    /* public function products(){
        return $this->hasMany(InvoiceProduct::class);
    } */

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
    
    public function products() {
        return $this->belongsToMany(Product::class, InvoiceProduct::class)->withPivot(['quantity', 'price']);
    }

    
}
