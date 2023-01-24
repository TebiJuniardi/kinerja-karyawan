<?php

namespace App\Imports;

use App\Models\JadwalKirim;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithStartRow;

class JadwalKirimImport implements ToModel,WithStartRow,WithCalculatedFormulas
{
    protected $jadwalKirim;

    public function __construct($jadwalKirim)
    {
        $this->jadwalKirim = $jadwalKirim;
    }
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        if ($row[0] == null) {
            return null;
        }else{
            $data = [
                'jadwal_pengiriman' => $this->jadwalKirim,
                'id_driver' => trim($row[0]),
                'no_resi' => trim($row[0]),
            ];

            $check = JadwalKirim::where($data);
            if ($check->count == 0) {
                return new JadwalKirim([
                    'jadwal_kirim'=> $this->jadwalKirim,
                    'no_resi'=> trim($row[0]),
                    'nik_driver'=> trim($row[0]),
                    'created_by' => auth()->user()->id,
                    'updated_by' => auth()->user()->id,
                ]);
            }else{
                $check->update([
                    'jadwal_kirim' => $this->jadwalKirim,
                    'no_resi' => trim($row[0]),
                    'nik_driver' => trim($row[0]),
                    'created_by' => auth()->user()->id,
                    'updated_by' => auth()->user()->id,
                ]);
            }
        }
    }

    public function startRow(): int
    {
        return 2;
    }
}
