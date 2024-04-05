<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'device',
        'service_id',
        'description',
        'make',
        'model',
        'processor',
        'ram',
        'storage',
        'is_collection',
        'is_dropoff',
        'status',
        'pickup',
        'pickup_date',
        'pickup_time',
    ];
}
