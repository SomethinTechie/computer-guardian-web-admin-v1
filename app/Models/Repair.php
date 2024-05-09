<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repair extends Model
{
    use HasFactory;

    protected $table = 'repairs';

    protected $fillable = [
        'user_id',
        'quote_request_id',
        'status',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function quoteRequest()
    {
        return $this->belongsTo(QuoteRequest::class, 'quote_request_id');
    }
}
