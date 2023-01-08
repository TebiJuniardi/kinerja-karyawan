<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class paketController extends Controller
{
    public function index()
    {
        $no = 1;
        $data = Paket::select("*")->get();
        return view('admin.paket',[
            'data'=>$data,
            'no' => $no
        ]);
    }

    public function createPaket(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'no_resi' => 'required'
            ,'nama_pengirim' => 'required'
            ,'alamat_pengirim'=>'required'
            ,'no_tlpn_pengirim'=>'required'
            ,'nama_penerima' => 'required'
            ,'alamat' => 'required'
            ,'no_tlpn' => 'required'
            ,'berat' => 'required'
        ]);

        if ($validator->fails()) {
            Alert::error($validator->messages()->all()[0])->withInput();
            return back();
    }

        $insert['no_resi'] = $request->input('no_resi');
        $insert['nama_pengirim'] = $request->input('nama_pengirim');
        $insert['alamat_pengirim'] = $request->input('alamat_pengirim');
        $insert['no_tlpn_pengirim'] = $request->input('no_tlpn_pengirim');
        $insert['nama_penerima'] = $request->input('nama_penerima');
        $insert['alamat'] = $request->input('alamat');
        $insert['no_tlpn_user'] = $request->input('no_tlpn');
        $insert['berat'] = $request->input('berat');

        $result = Paket::create($insert);

        Alert::success('Success Insert');
        return redirect()->route('admin/paket');
    }

    public function editPAket(Request $request)
    {
        try {
            Paket::where('id', $request->input('id'))
            ->update([
                'no_resi' => $request->input('no_resi'),
                'nama_penerima' => $request->input('nama_penerima'),
                'alamat' => $request->input('alamat'),
                'no_tlpn_user' => $request->input('no_tlpn'),
                'berat' => $request->input('berat')
            ]);
            Alert::success('Success Teredit');
            return redirect()->route('admin/paket');
        } catch (\Throwable $e) {
            Alert::error($e->getMessage());
            return back();
        }
    }

    public function deletePaket($id)
    {
        Paket::where('id',$id)->delete();
        Alert::success('Data Driver Terhapus');
        return back();
    }

    public function paketPelanggan()
    {
        $no = 1;
        $data = Paket::select("*")->get();
        return view('pelanggan.paket',[
            'data'=>$data,
            'no' => $no
        ]);
    }
}
