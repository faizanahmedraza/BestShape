<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buser extends Model
{
    use HasFactory;

    protected $hidden = [ 'email','password'];

    protected $fillable = [
        'fullname',
        'phone',
        'email',
        'password',
        'address',
        'days',
        'energy_units',
        'weight_units',
        'height_units',
        'activity_level',
        'user',
        'coach',
        'tnc'
    ];
}
