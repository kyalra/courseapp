<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;

    protected $table='detail_transactions';

    protected $fillable = [
        'trans_id',
        'course_id',
        'instructor_id',
        'startdate',
        'price',
        'discount',
    ];
}
