<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KegiatanModel extends Model
{
    use HasFactory;

    protected $table = 'kegiatan';
    protected $primaryKey = 'kegiatan_id';
    protected $fillable = [
        'kegiatan_nama',
        'kegiatan_lokasi',
        'tanggal_waktu',
        'user_id'
    ];
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(UserModel::class, 'user_id', 'user_id');
    }
}
