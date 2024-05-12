<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'username',
        'password'
    ];

    public function pengumuman(): HasMany
    {
        return $this->hasMany(PengumumanModel::class, 'user_id', 'user_id');
    }

    public function kegiatan(): HasMany
    {
        return $this->hasMany(KegiatanModel::class, 'user_id', 'user_id');
    }
}