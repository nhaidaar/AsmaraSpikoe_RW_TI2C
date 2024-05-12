<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailWargaModel extends Model
{
    use HasFactory;

    protected $table = 'detail_warga';
    protected $primaryKey = 'detail_Warga_id';
    protected $fillable = [
        'warga_id',
        'pendapatan',
        'luas_rumah',
        'jumlah_tanggungan',
        'tanggungan_pendidikan',
        'pbb',
        'tagihan_listrik',
        'tagihan_air',
        'bpjs',
        'jumlah_kendaraan',
    ];

    public function detailWarga(): BelongsTo
    {
        return $this->belongsTo(WargaModel::class, 'warga_id', 'warga_id');
    }
}
