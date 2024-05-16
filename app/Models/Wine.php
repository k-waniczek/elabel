<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wine extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'wines';

    protected $fillable = [
        'name',
        'user_id',
        'volume',
        'weight',
        'vintage',
        'type',
        'style',
        'sugar_content',
        'packaging_gases',
        'appellation',
        'portion_volume',
        'alcohol',
        'residual_sugar',
        'total_acidity',
        'kilocalorie',
        'kilojoule',
        'fat_total',
        'fat_saturates',
        'carbohydrate_total',
        'carbohydrate_sugar',
        'protein',
        'salt',
        'warning_drinking_during_pregnancy',
        'warning_drinking_below_legal_age',
        'warning_drinking_when_driving',
        'certifications_organic',
        'certifications_vegetarian',
        'certifications_vegan',
        'country',
        'sku',
        'ean'
    ];
}
