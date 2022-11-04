<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Countrie extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'code',
        'full_name',
        'iso3',
        'number',
        'continent_code',
        'display_order'
    ];

    public $timestamps = false;

    public function continent()
    {
        return $this->belongsTo(Continent::class);
    }
}
