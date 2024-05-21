<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BalasanKonsultasi extends Model
{
    use HasFactory;
    protected $table = 'balasan_konsultasi';
    protected $fillable = [
        'balasan',
        'user_id',
        'konsultasi_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function konsultasi()
    {
        return $this->belongsTo(Konsultasi::class, 'konsultasi_id');
    }
}
