<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KriteriaModel extends Model
{
    use HasFactory;

    protected $table = 'kriteria';
    protected $primaryKey = 'kriteria_id';
    protected $fillable = [
        'nama_kriteria'
    ];

    public function detailMaut(): HasMany
    {
        return $this->hasMany(DetailMautModel::class, 'kriteria_id', 'kriteria_id');
    }
}
