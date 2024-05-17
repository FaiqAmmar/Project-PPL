<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modul extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'modules';
    protected $fillable = [
        "judul_modul",
        "deskripsi_modul",
        "modul",
        "video",
        "status",
    ];

}
