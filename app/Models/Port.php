<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Port extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'country',
        'coordinates',
        'docking_capacity',
        'customs_authorized',
        'is_active',
    ];
}
