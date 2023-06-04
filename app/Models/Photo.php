<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        "file",
        "total",
        "type",
        "face_number",
        "is_cover",
        "status",
        "user_name",
        "user_phone",
        "user_address",
        "descriptions",
        "user_id",
    ];
}
