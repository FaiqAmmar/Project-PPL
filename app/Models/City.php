<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function province()
    {
        return $this->belongsTo(Province::class);
    }
    public function district()
    {
        return $this->hasMany(District::class);
    }
    use HasFactory;
}
