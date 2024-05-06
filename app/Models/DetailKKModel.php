<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailKKModel extends Model
{
    use HasFactory;

    protected $table = 'detail_kk';
    protected $primaryKey = 'detail_kk_id';
    protected $fillable = [
        'kk_id',
        'warga_id',
        'hubungan_id'
    ];

    public function kartuKeluarga(): BelongsTo
    {
        return $this->belongsTo(KKModel::class, 'kk_id', 'kk_id');
    }

    public function anggotaKeluarga(): BelongsTo
    {
        return $this->belongsTo(WargaModel::class, 'warga_id', 'warga_id');
    }
    
    public function statusHubungan(): BelongsTo
    {
        return $this->belongsTo(StatusHubunganModel::class, 'hubungan_id', 'hubungan_id');
    }   
}
