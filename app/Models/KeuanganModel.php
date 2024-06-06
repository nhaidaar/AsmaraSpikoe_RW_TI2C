<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeuanganModel extends Model
{
    use HasFactory;

    protected $table = 'keuangan';
    protected $primaryKey = 'keuangan_id';
    protected $fillable = [
        'tanggal',
        'jenis_keuangan',
        'nominal',
        'keterangan_keuangan',
        'rt_id'
    ];
}
