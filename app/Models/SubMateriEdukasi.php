<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\MateriEdukasi;
use App\Models\UlasanEdukasi;
use App\Models\RatingEdukasi;


class SubMateriEdukasi extends Model
{
    use HasFactory;
    protected $table = 'sub_materi_edukasi';
    protected $guarded = ['id'];
    protected $fillable = [
        'judul',
        'body',
        'modul',
        'video',
        'materi_edukasi_id',
    ];

    public function materiEdukasi(): BelongsTo
    {
        return $this->belongsTo(MateriEdukasi::class,'materi_edukasi_id');
    }

    public function ulasan(): HasMany
    {
        return $this->hasMany(UlasanEdukasi::class);
    }
    public function rating(): HasMany
    {
        return $this->hasMany(RatingEdukasi::class);
    }
}
