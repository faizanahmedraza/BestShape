<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'recipeImage',
        'name',
        'description',
        'category',
        'netcarb',
        'netcarb_p',
        'totalcarb',
        'totalcarb_p',
        'netcal',
        'totalfat',
        'totalfat_p',
        'choles',
        'choles_p',
        'sod',
        'sod_p',
        'pot',
        'pot_p'
    ];
}
