<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'service_id',
    ];

    protected $casts = [
        'is_ordered' => 'boolean',
        'is_reviewable' => 'boolean',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
