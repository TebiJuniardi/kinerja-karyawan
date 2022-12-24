<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JadwalKirim;
use Illuminate\Http\Request;

class jadwalController extends Controller
{
    public function index()
    {
        $no = 1;
        $data = JadwalKirim::select("*")->get();
        return view('admin.jadwal_kirim',[
            'data'=>$data,
            'no' => $no
        ]);
    }
}
