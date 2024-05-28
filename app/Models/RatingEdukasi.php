<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\SubMateriEdukasi;
use App\Models\User;


class RatingEdukasi extends Model
{
    use HasFactory;
    protected $table = 'rating_edukasi';
    protected $guarded = ['id'];
    protected $fillable = [
        'rating',
        'sub_materi_edukasi_id',
        'user_id',
    ];

    public function subMateriEdukasi(): BelongsTo
    {
        return $this->belongsTo(SubMateriEdukasi::class,'sub_materi_edukasi_id');
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
