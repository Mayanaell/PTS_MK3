<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    //
    protected $fillable = [
       'tipe_pembayaran',
        'payment_date',
        'total'
    ];
}
