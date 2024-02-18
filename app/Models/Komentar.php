<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;

    protected $fillable = [
        'komentar_id',
        'foto_id',
        'user_id',
        'isi_komentar',
        'tanggal_komentar',
    ];

    protected $primaryKey = 'komentar_id';

    protected $table = 'komentarfoto';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function foto()
    {
        return $this->belongsTo(Foto::class, 'foto_id');
    }
}

