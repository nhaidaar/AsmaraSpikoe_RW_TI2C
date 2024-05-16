<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KKModel extends Model
{
    use HasFactory;

    protected $table = 'kartu_keluarga';
    protected $primaryKey = 'kk_id';
    protected $fillable = [
        'no_kk',
        'rt'
    ];

    public function rt(): BelongsTo
    {
        return $this->belongsTo(RTModel::class, 'rt', 'rt_id');
    }

    public function detailKK(): HasMany
    {
        return $this->hasMany(DetailKKModel::class, 'kk_id', 'kk_id');
    }
}
