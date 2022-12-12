<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class driverController extends Controller
{
    public function index()
    {
        $no = 1;
        $data = Driver::select("*")->get();
        return view('admin.driver',[
            'data'=>$data,
            'no' => $no
        ]);
    }

    public function createDriver(Request $request)
    {
        $insert['nik'] = $request->input('nik');
        $insert['nama_lengkap'] = $request->input('nama_driver');
        $insert['plat_nomor'] = $request->input('plat_nomor');
        $insert['email'] = $request->input('email');
        $insert['alamat'] = $request->input('alamat');

        $result = Driver::create($insert);

        return redirect()
            ->route('admin/driver')
            ->with('message', [
                'type' => $result ? 'Success' : 'Failed',
                'text' => $result ? 'Driver Terlah Ditambahkan' : 'Gagal Menambahkan Driver',
            ]);
    }
}
