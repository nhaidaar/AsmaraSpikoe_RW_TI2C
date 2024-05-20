<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User;

class UserModel extends User
{
    use HasFactory;

    protected $table = 'users';
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'level',
        'username',
        'warga_id',
        'password'
    ];

    public function warga(): BelongsTo
    {
        return $this->belongsTo(WargaModel::class, 'warga_id', 'warga_id');
    }

    public function pengumuman(): HasMany
    {
        return $this->hasMany(PengumumanModel::class, 'user_id', 'user_id');
    }

    public function kegiatan(): HasMany
    {
        return $this->hasMany(KegiatanModel::class, 'user_id', 'user_id');
    }
}
