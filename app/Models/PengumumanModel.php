<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PengumumanModel extends Model
{
    use HasFactory;

    protected $table = 'pengumuman';
    protected $primaryKey = 'pengumuman_id';
    protected $fillable = [
        'pengumuman_nama',
        'pengumuman_lokasi',
        'tanggal_waktu',
        'user_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(UserModel::class, 'user_id', 'user_id');
    }
}
