<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'weight',
        'volume',
        'cargo_type',
        'client_id',
        'is_active',
    ];
}
