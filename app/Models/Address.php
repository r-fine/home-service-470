<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'full_name',
        'phone',
        'town_city',
        'postal_code',
        'address_line',
        'address_line_2'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
