<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'expedition_date',
        'value',
        'invoice_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public static $rules = [
        'expedition_date' => 'required',
        'value' => 'required',
        'invoice_id' => 'required'
    ];

    public function invoice(){
        return $this->belongsTo(Invoice::class);
    }
}
