<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahanAjar extends Model
{
    use HasFactory;
    protected $table = 'bahan_ajar';
    protected $fillable = [
        'ajuan',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
