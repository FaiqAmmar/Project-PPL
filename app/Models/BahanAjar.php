<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
Use App\Models\User;

class BahanAjar extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = ['bahan_ajar'];
    protected $fillable = [
        'ajuan',
        'user_id',
    ];

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
