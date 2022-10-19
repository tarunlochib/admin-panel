<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UserAddress extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = [
        'formatted_address'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getFormattedAddressAttribute()
    {
        return $this->building_no.",".$this->street_name;
    }
}
