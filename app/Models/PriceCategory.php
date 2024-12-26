<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceCategory extends Model
{
    use HasFactory, HasUlids;
    protected $fillable = [
        'id',
        'name',
        'min',
        'max',
        'is_active',
        'created_by_id',
        'updated_by_id',
    ];
}
