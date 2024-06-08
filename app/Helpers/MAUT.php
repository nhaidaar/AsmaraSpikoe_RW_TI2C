<?php

namespace App\Helpers;

use App\Models\MautModel;
use App\Models\DetailMautModel;
use App\Models\KriteriaModel;
use Illuminate\Support\Facades\DB;

class MAUT
{
    private $kriteria = [];
    private $bobot = [];
    private $alternatif = [];
    private $utilities = [];
    private $kriteriaMinMax = [];

    public function __construct($kriteria, $bobot)
    {
        $this->kriteria = $kriteria;
        $this->bobot = $bobot;
    }

    public function addAlternative($id, $values)
    {
        $scores = [
            'pendapatan' => $this->scorePendapatan($values['pendapatan']),
            'jumlah_kendaraan' => $this->scoreJumlahKendaraan($values['jumlah_kendaraan']),
            'bpjs' => $this->scoreBPJS($values['bpjs']),
            'luas_rumah' => $this->scoreLuasBangunan($values['luas_rumah']),
            'jumlah_tanggungan' => $this->scoreJumlahTanggungan($values['jumlah_tanggungan']),
            'pbb' => $this->scorePBB($values['pbb']),
            'tagihan_listrik' => $this->scoreTagihanListrik($values['tagihan_listrik']),
            'tagihan_air' => $this->scoreTagihanAir($values['tagihan_air']),
            'tanggungan_pendidikan' => $this->scoreTanggunganPendidikan($values['tanggungan_pendidikan']),
        ];

        $this->alternatif[$id] = $scores;
    }


    private function calculateUtility($value, $min, $max)
    {
        if ($max == $min) {
            return 1; // Avoid division by zero if all values are the same
        }
        return ($value - $min) / ($max - $min);
    }

    public function evaluate()
    {
        // Mencari min max tiap kriteria
        foreach ($this->kriteria as $c) {
            $values = array_column($this->alternatif, $c);
            $this->kriteriaMinMax[$c] = [
                'min' => min($values),
                'max' => max($values)
            ];
        }

        // Kalkulasi skor tiap alternatif
        foreach ($this->alternatif as $id => $value) {
            $skorAkhir = 0;

            foreach ($this->kriteria as $c) {
                $skorKriteria = $this->calculateUtility(
                    $value[$c],
                    $this->kriteriaMinMax[$c]['min'],
                    $this->kriteriaMinMax[$c]['max']
                );

                $skorAkhir += $this->bobot[$c] * $skorKriteria;
            }
            $this->utilities[$id] = $skorAkhir;
        }

        arsort($this->utilities);
    }

    public function saveResults()
    {
        try {
            DB::beginTransaction();
            foreach ($this->utilities as $id => $value) {
                // Menambahkan perhitungan tiap warga ke dalam tabel maut
                $maut = MautModel::create([
                    'warga_id' => $id,
                    'skor_akhir' => $value
                ]);

                // Menambahkan perhitungan tiap kriteria tiap warga ke dalam tabel detail maut
                foreach ($this->kriteria as $c) {
                    $value = $this->alternatif[$id][$c];
                    $skorKriteria = $this->calculateUtility(
                        $value,
                        $this->kriteriaMinMax[$c]['min'],
                        $this->kriteriaMinMax[$c]['max']
                    );

                    // Mencari kriteria_id berdasarkan kriteria_nama
                    $kriteria = KriteriaModel::where('kriteria_nama', $c)->first();

                    DetailMautModel::insert([
                        'maut_id' => $maut->getKey(),
                        'kriteria_id' => $kriteria->kriteria_id,
                        'kriteria_skor' => $skorKriteria
                    ]);
                }
            }
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }
    }

    function scorePendapatan($pendapatan)
    {
        return $pendapatan <= 500000 ? 6 : ($pendapatan <= 1000000 ? 5 : ($pendapatan <= 1500000 ? 4 : ($pendapatan <= 2000000 ? 3 : ($pendapatan <= 2500000 ? 2 : 1))));
    }

    function scoreJumlahKendaraan($jumlah_kendaraan)
    {
        return $jumlah_kendaraan == 0 ? 5 : ($jumlah_kendaraan == 1 ? 4 : ($jumlah_kendaraan == 2 ? 3 : ($jumlah_kendaraan == 3 ? 2 : 1)));
    }

    function scoreBPJS($bpjs)
    {
        return $bpjs == 'Tidak ada' ? 4 : ($bpjs == 'Kelas 3' ? 3 : ($bpjs == 'Kelas 2' ? 2 : 1));
    }

    function scoreLuasBangunan($luas)
    {
        return $luas <= 20 ? 5 : ($luas <= 30 ? 4 : ($luas <= 40 ? 3 : ($luas <= 50 ? 2 : 1)));
    }

    function scoreJumlahTanggungan($jumlah_tanggungan)
    {
        return $jumlah_tanggungan > 5 ? 5 : ($jumlah_tanggungan == 5 ? 4 : ($jumlah_tanggungan == 4 ? 3 : ($jumlah_tanggungan == 3 ? 2 : 1)));
    }

    function scorePBB($pbb)
    {
        return $pbb < 100000 ? 3 : ($pbb <= 200000 ? 2 : 1);
    }

    function scoreTagihanListrik($tagihan_listrik)
    {
        return $tagihan_listrik <= 100000 ? 5 : ($tagihan_listrik <= 200000 ? 4 : ($tagihan_listrik <= 300000 ? 3 : ($tagihan_listrik <= 400000 ? 2 : 1)));
    }

    function scoreTagihanAir($tagihan_air)
    {
        return $tagihan_air <=  50000 ? 5 : ($tagihan_air <= 100000 ? 4 : ($tagihan_air <= 150000 ? 3 : ($tagihan_air <= 200000 ? 2 : 1)));
    }

    function scoreTanggunganPendidikan($tanggungan_pendidikan)
    {
        return $tanggungan_pendidikan > 4 ? 5 : ($tanggungan_pendidikan == 4 ? 4 : ($tanggungan_pendidikan == 3 ? 3 : ($tanggungan_pendidikan == 2 ? 2 : 1)));
    }
}
