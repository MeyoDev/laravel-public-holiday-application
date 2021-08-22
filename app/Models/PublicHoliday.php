<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicHoliday extends Model
{
    use HasFactory;

    protected $table = 'public_holidays';

    protected $fillable = [
        'ph_name',
        'ph_day',
        'ph_month',
        'ph_year',
        'ph_day_of_week',
        'ph_hash'
    ];
}
