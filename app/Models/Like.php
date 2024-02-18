<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        'like_id',
        'foto_id',
        'user_id',
        'tanggal_like',
    ];

    protected $primaryKey = 'like_id';

    protected $table = 'likefoto';

    public function user()
    {
        return $this->belongsTo(User::class, 'foto_id');
    }
    public function photo()
    {
        return $this->belongsTo(Foto::class, 'user_id');
    }
}
