<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitCategory extends Model
{
    use HasFactory, HasUlids;
    protected $fillable = [
        'id',
        'name',
        'is_active',
        'created_by_id',
        'updated_by_id',
    ];
}
