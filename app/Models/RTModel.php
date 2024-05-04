<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RTModel extends Model
{
    use HasFactory;

    protected $table = 'rukun_tetangga';
    protected $primaryKey = 'rt_id';
    protected $fillable = [
        'ketua_rt',
        'no_telepon'
    ];

    public function ketuaRT(): BelongsTo
    {
        return $this->belongsTo(WargaModel::class, 'ketua_rt', 'warga_id');
    }

    public function kartuKeluarga(): HasMany
    {
        return $this->hasMany(KKModel::class, 'rt', 'rt_id');
    }
}
