<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\JadwalKirimImport;
use App\Models\JadwalKirim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class jadwalController extends Controller
{
    public function index()
    {
        $no = 1;
        $data = DB::select("SELECT
                                a.id,
                                b.jadwal_pengiriman,
                                a.no_resi,
                                a.nama_pengirim,
                                a.alamat_pengirim,
                                a.no_tlpn_pengirim,
                                a.nama_penerima,
                                a.alamat,
                                a.no_tlpn_user,
                                a.berat,
                                c.nama_lengkap as driver,
                                case when a.status = '0' then 'Belum Selesai'
                                when a.status = '1' then 'Selesai'
                                end status,
                                a.attachment
                            from
                                table_pakets a
                            left join table_jadwals b
                            on a.no_resi = b.no_resi
                            left join table_drivers c
                            on b.id_driver = c.nik
                            where b.jadwal_pengiriman = '".date('Y-m-d')."'");
        return view('admin.jadwal_kirim',[
            'data'=>$data,
            'no' => $no
        ]);
    }

    public function importJadwalKirim(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'file_excel' => 'required|mimes:xlsx,xls',
            'jadwalKirim' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $jadwalKirim = $request->jadwalKirim;
        $file = $request->file('file_excel');

        $rows = Excel::toArray(new JadwalKirimImport($jadwalKirim),$file);

        $data = [];
        foreach ($rows[0] as $row) {
            if (!empty($row[0]) && !empty($row[1])) {
                JadwalKirim::updateOrCreate([
                    'jadwal_pengiriman'=> date('Y-m-d', strtotime($jadwalKirim)),
                    'no_resi' => $row[0],
                    'id_driver' => $row[1],
                    'created_by' => auth()->user()->id,
                    'updated_by' => auth()->user()->id,
                ],
                [
                    'jadwal_pengiriman'=> date('Y-m-d', strtotime($jadwalKirim)),
                    'no_resi'=> $row[0],
                    'id_driver'=> $row[1],
                    'created_by' => auth()->user()->id,
                    'updated_by' => auth()->user()->id,
                ]);
            }
        }
        Alert::success('Success Upload');
        return back();
    }
}
