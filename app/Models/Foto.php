<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    protected $fillable = [
        'foto_id',
        'user_id',
        'judul_foto',
        'deskripsi_foto',
        'tanggal_unggah',
        'lokasi_file',
        'album_id',
    ];

    protected $primaryKey = 'foto_id';

    protected $table = 'foto';

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Komentar::class, 'foto_id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class, 'foto_id');
    }
}
