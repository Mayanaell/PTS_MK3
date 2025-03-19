<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kamar extends Model
{
    //
    protected $fillable = [
        'room_nomor',
        'tipe_kamar',
        'status'
    ];
}
