<?php

namespace App\Helpers;

use App\Models\MautModel;
use App\Models\DetailMautModel;
use App\Models\KriteriaModel;
use Illuminate\Support\Facades\DB;

class MAUT
{
    private $criteria = [];
    private $weights = [];
    private $alternatives = [];
    private $utilities = [];
    private $criteriaMinMax = [];

    public function __construct($criteria, $weights)
    {
        $this->criteria = $criteria;
        $this->weights = $weights;
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

        $this->alternatives[$id] = $scores;
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
        // Find min and max for each criterion
        foreach ($this->criteria as $criterion) {
            $values = array_column($this->alternatives, $criterion);
            $this->criteriaMinMax[$criterion] = [
                'min' => min($values),
                'max' => max($values)
            ];
        }

        // Calculate utilities
        foreach ($this->alternatives as $id => $values) {
            $overallUtility = 0;
            foreach ($this->criteria as $c) {
                $utilityValue = $this->calculateUtility(
                    $values[$c],
                    $this->criteriaMinMax[$c]['min'],
                    $this->criteriaMinMax[$c]['max']
                );
                $overallUtility += $this->weights[$criterion] * $utilityValue;
            }
            $this->utilities[$id] = $overallUtility;
        }
        arsort($this->utilities); // Sort alternatives by their utilities in descending order
    }

    public function getRankedAlternatives()
    {
        return $this->utilities;
    }

    public function saveResults()
    {
        try {
            DB::beginTransaction();
            foreach ($this->utilities as $wargaId => $utility) {
                // Save the overall utility score to the maut table
                $maut = MautModel::create([
                    'warga_id' => $wargaId,
                    'skor_akhir' => $utility
                ]);

                // Save the individual criterion scores to the detail_maut table
                foreach ($this->criteria as $criterion) {
                    $criterionValue = $this->alternatives[$wargaId][$criterion];
                    $criterionUtility = $this->calculateUtility(
                        $criterionValue,
                        $this->criteriaMinMax[$criterion]['min'],
                        $this->criteriaMinMax[$criterion]['max']
                    );

                    // Fetch the kriteria_id for the given criterion name
                    $kriteria = KriteriaModel::where('kriteria_nama', $criterion)->first();

                    DetailMautModel::insert([
                        'maut_id' => $maut->getKey(),
                        'kriteria_id' => $kriteria->kriteria_id,
                        'kriteria_skor' => $criterionUtility
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
        return $pendapatan < 500000 ? 6 : ($pendapatan <= 1000000 ? 5 : ($pendapatan <= 2000000 ? 4 : ($pendapatan <= 3000000 ? 3 : ($pendapatan <= 5000000 ? 2 : 1))));
    }

    function scoreJumlahKendaraan($jumlah_kendaraan)
    {
        return $jumlah_kendaraan == 0 ? 5 : ($jumlah_kendaraan == 1 ? 4 : ($jumlah_kendaraan == 2 ? 3 : ($jumlah_kendaraan == 3 ? 2 : 1)));
    }

    function scoreBPJS($bpjs)
    {
        return $bpjs == 'Kelas 3' ? 3 : ($bpjs == 'Kelas 2' ? 2 : 1);
    }

    function scoreLuasBangunan($luas)
    {
        return $luas < 50 ? 5 : ($luas <= 100 ? 4 : ($luas <= 150 ? 3 : ($luas <= 200 ? 2 : 1)));
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
        return $tagihan_listrik > 400000 ? 1 : ($tagihan_listrik <= 400000 ? 2 : ($tagihan_listrik <= 300000 ? 3 : ($tagihan_listrik <= 200000 ? 4 : 5)));
    }

    function scoreTagihanAir($tagihan_air)
    {
        return $tagihan_air > 200000 ? 1 : ($tagihan_air <= 200000 ? 2 : ($tagihan_air <= 150000 ? 3 : ($tagihan_air <= 100000 ? 4 : 5)));
    }

    function scoreTanggunganPendidikan($tanggungan_pendidikan)
    {
        return $tanggungan_pendidikan > 4 ? 5 : ($tanggungan_pendidikan == 4 ? 4 : ($tanggungan_pendidikan == 3 ? 3 : ($tanggungan_pendidikan == 2 ? 2 : 1)));
    }
}
