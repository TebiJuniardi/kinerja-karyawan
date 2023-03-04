<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\NotifyMail;
use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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
        $insert['email_pengirim'] = $request->input('email_pengirim');
        $insert['email_penerima'] = $request->input('email_penerima');

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
        return view('user.paket');
    }

    public function selesaiPaket(Request $request)
    {
        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('paket'), $imageName);

        Paket::where('id', $request->id)->update([
            'status' => $request->status,
            'attachment' => $imageName,
        ]);

        $getdata = Paket::select("*")->where('id',$request->id)->get();
        $mailData = [
            "no_resi" => $getdata[0]->no_resi,
            "dob" => "12/12/1990"
        ];
        Mail::to($getdata[0]->email_penerima)->send(new NotifyMail($mailData));

        Alert::success('Paket Sudah Sampai');
        return back();
    }

    public function konfirmPaket($no_resi)
    {
        Paket::where('no_resi', $no_resi)->update([
            'confirm_user' => '1'
        ]);

        return view('user.paket');
    }
}
