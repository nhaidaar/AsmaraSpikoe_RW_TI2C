<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PekerjaanModel extends Model
{
    use HasFactory;

    protected $table = 'pekerjaan';
    protected $primaryKey = 'pekerjaan_id';
    protected $fillable = [
        'pekerjaan_nama'
    ];

    public function pekerjaanWarga(): HasMany
    {
        return $this->hasMany(WargaModel::class, 'pekerjaan', 'pekerjaan_id');
    }
}
