<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\MateriEdukasi;


class JenisEdukasi extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'jenis_edukasi';

    protected $fillable = [
        'judul_modul'
    ];


    public function materiEdukasi(): HasMany
    {
        return $this->hasMany(MateriEdukasi::class, 'jenis_id');
    }
}
