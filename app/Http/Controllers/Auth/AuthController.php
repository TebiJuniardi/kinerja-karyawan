<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration()
    {
        return view('auth.registration');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('You have Successfully loggedin');
        }

        Alert::error('Email/Password salah');
        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("dashboard")->withSuccess('Great! You have Successfully loggedin');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
        if(Auth::check()){
            // return view('layout/app');
            $totalSelesai = DB::select("SELECT td.nama_lengkap,count(tp.no_resi) total,td.foto from table_pakets tp
            left join table_jadwals tj on tp.no_resi = tj.no_resi
            left join table_drivers td on tj.id_driver = td.nik
            where tp.status = '1'
            group by td.nama_lengkap,td.foto
            order by count(tp.no_resi) desc
            limit 1");

            $totalPaketSelesai = DB::select("SELECT
                                    tp.nama_pengirim,
                                    tp.alamat_pengirim,
                                    tp.nama_penerima,
                                    tp.alamat,
                                    tp.berat,
                                    td.nama_lengkap
                                from
                                    table_pakets tp
                                left join table_jadwals tj on
                                    tp.no_resi = tj.no_resi
                                left join table_drivers td on
                                    tj.id_driver = td.nik
                                where
                                    month(tj.jadwal_pengiriman) = month(sysdate())
                                    and status = '1'");

            return view('dashboard.dashboard',[
                'totalSelesai' => $totalSelesai[0],
                'table' => $totalPaketSelesai
            ]);
        }

        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout() {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
