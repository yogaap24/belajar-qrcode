<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sertifikat;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sertifikat = Sertifikat::orderBy('created_at', 'desc')->get();
        return view('home')->with(['sertifikat' => $sertifikat]);
    }

    public function saveSertifikat(Request $req) {

        $saveData = Sertifikat::create([
            'nama_lengkap' => $req->nama_lengkap,
            'tanggal_lahir' => $req->tanggal_lahir,
            'gender' => $req->gender,
            'no_sertifikat' => $req->no_sertifikat,
            'tanggal_test' => $req->tanggal_test,
            'id_test' => $req->id_test,
            'sect_1' => $req->sect_1,
            'score_1' => $req->score_1,
            'sect_2' => $req->sect_2,
            'score_2' => $req->score_2,
            'sect_3' => $req->sect_3,
            'score_3' => $req->score_3,
        ]);

        return redirect('/home')->with([
            'success' => "Data Berhasil Masuk"
        ]);
    }

    public function editSertifikat($id) {
	$sertifikat = Sertifikat::find($id);
        return view('editSertifikat')->with(['sertifikat' => $sertifikat]);
    }

    public function viewSertifikat($id) {
	$sertifikat = Sertifikat::find($id);
        return view('viewSertifikat')->with(['sertifikat' => $sertifikat]);
    }

    public function updateSertifikat(Request $req) {

        $id = $req->id;

        $updateData = Sertifikat::where('id', $id)->update([
            'nama_lengkap' => $req->nama_lengkap,
            'tanggal_lahir' => $req->tanggal_lahir,
            'gender' => $req->gender,
            'no_sertifikat' => $req->no_sertifikat,
            'tanggal_test' => $req->tanggal_test,
            'id_test' => $req->id_test,
            'sect_1' => $req->sect_1,
            'score_1' => $req->score_1,
            'sect_2' => $req->sect_2,
            'score_2' => $req->score_2,
            'sect_3' => $req->sect_3,
            'score_3' => $req->score_3,
        ]);

        return redirect()->route('home')->with(['success', 'Update Success']);
    }

    public function deleteSertifikat($id) {
        $sertifikat = Sertifikat::where('id', $id)->delete();
        return redirect('/home')->with([
            'success' => "Data Berhasil Di Hapus"
        ]);
    }
}
