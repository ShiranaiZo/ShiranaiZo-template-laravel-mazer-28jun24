<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class promo extends Model
{
    use HasFactory, HasUlids;
    protected $fillable = [
        'id',
        'name',
        'image',
        'description',
        'is_active',
        'published_at',
        'expired_at',
        'price',
        'show_price',
        'genders',
        'age_category_ids',
        'price_category_id',
        'unit_category_id',
        'created_by_id',
        'updated_by_id',
    ];
    
    public function ageCategory()
    {
        return $this->belongsTo(AgeCategory::class, 'age_category_id');
    }
    
    public function priceCategory()
    {
        return $this->belongsTo(PriceCategory::class, 'price_category_id');
    }
    
    public function unitCategory()
    {
        return $this->belongsTo(UnitCategory::class, 'unit_category_id');
    }
    
}
