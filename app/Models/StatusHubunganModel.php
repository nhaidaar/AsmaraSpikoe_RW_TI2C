<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StatusHubunganModel extends Model
{
    use HasFactory;

    protected $table = 'status_hubungan';
    protected $primaryKey = 'hubungan_id';
    protected $fillable = [
        'keterangan'
    ];

    public function statushubungan(): HasMany
    {
        return $this->hasMany(WargaModel::class, 'status_hubungan', 'hubungan_id');
    }
}
