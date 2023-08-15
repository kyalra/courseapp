<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table='transactions';

    protected $fillable = [
        'trans_code',
        'trans_date',
        'cust_name',
        'member',
        'subtotal',
        'discount',
        'total'
    ];
}
