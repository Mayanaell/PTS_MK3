<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    //
    protected $fillable = [
        'Fullname',
        'email' ,
        'nomor_telepon'
    ];
}
