<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Response;

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
        $validator = Validator::make($request->all(), [
            'nik' => 'required',
            'nama_driver' => 'required',
            'plat_nomor' => 'required',
            'email' => 'required',
            'alamat' => 'required',
        ]);
        $checkNik = Driver::where('nik', $request->input('nik'))->get();

        if ($validator->fails()) {
            Alert::error($validator->messages()->all()[0])->withInput();
            return back();
        }elseif($checkNik->count() > 0){
            Alert::error('Nik Sudah Ada');
            return back();
        }

        $insert['nik'] = $request->input('nik');
        $insert['nama_lengkap'] = $request->input('nama_driver');
        $insert['plat_nomor'] = $request->input('plat_nomor');
        $insert['email'] = $request->input('email');
        $insert['alamat'] = $request->input('alamat');

        $result = Driver::create($insert);

        Alert::success('Success Insert');
        return redirect()->route('admin/driver');
    }

        public function editDriver(Request $request)
        {
            try {
                Driver::where('nik', $request->input('nik'))
                ->update([
                    'nik' => $request->input('nik'),
                    'nama_lengkap' => $request->input('nama_driver'),
                    'plat_nomor' => $request->input('plat_nomor'),
                    'email' => $request->input('email'),
                    'alamat' => $request->input('alamat')
                ]);
                Alert::success('Success Insert');
                return redirect()->route('admin/driver');
            } catch (\Throwable $e) {
                Alert::error($e->getMessage());
                return back();
            }
        }

    public function deleteDriver($nik)
    {
        Driver::where('nik',$nik)->delete();
        Alert::success('Data Driver Terhapus');
        return back();
    }
}
