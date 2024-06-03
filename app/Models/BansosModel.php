<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BansosModel extends Model
{
    use HasFactory;

    protected $table = 'bansos';
    protected $primaryKey = 'bansos_id';
    protected $fillable = [
        'bansos_nama'
    ];

    public function penerimaBansos(): HasMany
    {
        return $this->hasMany(PenerimaBansosModel::class, 'bansos_id', 'bansos_id');
    }
}
