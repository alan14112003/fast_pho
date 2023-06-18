<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        "delivery_time",
        "user_id",
        "user_name",
        "user_phone",
        "user_address",
        "status",
    ];

    public function orderProducts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function orderPhotos(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(OrderPhoto::class);
    }
}
