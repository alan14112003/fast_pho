<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderPhoto extends Model
{
    use HasFactory;

    protected $table = 'order_photo';

    protected $fillable = [
        'order_id',
        'photo_id',
        'photo_price',
    ];
}
