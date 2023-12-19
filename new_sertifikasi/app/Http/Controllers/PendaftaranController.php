<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Auth;
use App\Models\Agama;
use App\Models\Provinsi;
use App\Models\Kota;
use Illuminate\Support\Facades\Validator;
use PDF;

class PendaftaranController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $pendaftaran = Pendaftaran::with(['agama', 'kota_alamat','kota_lahir']);
            
            if(Auth::user()->is_admin == 'n'){
                $pendaftaran = $pendaftaran->where('user_id', Auth::user()->user_id);
            }

            $pendaftaran = $pendaftaran->get();

            return view('pendaftaran.show_pendaftaran', compact('pendaftaran'));
        }else{
            return view('auth.login');
        }
    }
    
    public function create()
    {
        $agama = Agama::all();
        $provinsi = Provinsi::all();
        $kota = Kota::all();

        return view('pendaftaran.add_pendaftaran', compact('agama', 'provinsi', 'kota'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'foto' => 'required',
                'nama_lengkap' => 'required|string|max:255',
                'nik' => 'required|numeric|digits_between:16,16',
                'alamat_ktp' => 'required|string|max:255',
                'alamat_lengkap' => 'required|string|max:255',
                'kota_alamat_id' => 'required|numeric',
                'kecamatan' => 'required|string|max:255',
                'nomor_telepon' => 'required|numeric',
                'nomor_hp' => 'required|numeric',
                'email' => 'required|email:rfc,dns',
                'kewarganegaraan' => 'required|string|max:255',
                'negara_asal' => 'nullable|string|max:255',
                'tanggal_lahir' => 'required|date',
                'tempat_lahir' => 'string|max:255',
                'kota_lahir_id' => 'string|max:255',
                'negara_lahir' => 'nullable|string|max:255',
                'jenis_kelamin' => 'required|string|max:255',
                'status_menikah' => 'required|string|max:255',
                'agama_id' => 'required|string|max:255'
            ]);
    
            $request['user_id'] = Auth::user()->user_id;

            $foto = $request->file('foto');
            $nama_foto = $foto->getClientOriginalName();
            $foto->move(public_path('pp'), $nama_foto);

            $request['foto'] = $nama_foto;
            
            Pendaftaran::create($request->all());
    
            return redirect('pendaftaran/show_pendaftaran')->with('success', 'data added');
        } catch (\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    } 

    public function getDetail($id)
    {
        if (Auth::check()) {
            $agama = Agama::all();
            $provinsi = Provinsi::all();
            $kota = Kota::all();

            $pendaftaran = Pendaftaran::with(['agama', 'kota_alamat','kota_lahir'])
                            ->where('pendaftaran_id', $id)->first();

            return view('pendaftaran.detail_pendaftaran', compact('pendaftaran', 'agama', 'provinsi', 'kota'));
        }else{
            return view('auth.login');
        }
    }

    public function edit($id)
{
    if (Auth::check()) {
        $agama = Agama::all();
        $provinsi = Provinsi::all();
        $kota = Kota::all();

        $pendaftaran = Pendaftaran::with(['agama', 'kota_alamat','kota_lahir'])
                        ->where('pendaftaran_id', $id)->first();

        return view('pendaftaran.edit_pendaftaran', compact('pendaftaran', 'agama', 'provinsi', 'kota'));
    }else{
        return view('auth.login');
    }
}

public function update(Request $request, $id)
{
    try{
        // Validasi data yang dikirimkan melalui $request
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'required|numeric|digits_between:16,16',
            'alamat_ktp' => 'required|string|max:255',
            'alamat_lengkap' => 'required|string|max:255',
            'kota_alamat_id' => 'required|numeric',
            'kecamatan' => 'required|string|max:255',
            'nomor_telepon' => 'required|numeric',
            'nomor_hp' => 'required|numeric',
            'email' => 'required|email:rfc,dns',
            'kewarganegaraan' => 'required|string|max:255',
            'negara_asal' => 'nullable|string|max:255',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'string|max:255',
            'kota_lahir_id' => 'string|max:255',
            'negara_lahir' => 'nullable|string|max:255',
            'jenis_kelamin' => 'required|string|max:255',
            'status_menikah' => 'required|string|max:255',
            'agama_id' => 'required|string|max:255'
            // Tambahkan validasi untuk kolom lainnya jika diperlukan
        ]);

        $pendaftaran = Pendaftaran::findOrFail($id);

        $pendaftaran->update([
            'nama_lengkap' => $request->input('nama_lengkap'),
            'nik' => $request->input('nik'),
            'alamat_KTP' => $request->input('alamat_KTP'),
            'alamat_lengkap' => $request->input('alamat_lengkap'),
            'kota_alamat_id' => $request->input('kota_alamat_id'),
            'kecamatan' => $request->input('kecamatan'),
            'nomor_telepon' => $request->input('nomor_telepon'),
            'nomor_hp' => $request->input('alamat_KTP'),
            'email' => $request->input('email'),
            'kewarganegaraan' => $request->input('kewarganegaraan'),
            'negara_asal' => $request->input('negara_asal'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'kota_lahir_id' => $request->input('kota_lahir_id'),
            'negara_lahir' => $request->input('negara_lahir'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'status_menikah' => $request->input('status_menikah'),
            'agama_id' => $request->input('agama_id')
        ]);

        return redirect('pendaftaran/show_pendaftaran')->with('success', 'Pendaftaran updated successfully.');
    }catch (\Exception $e){
        return redirect()->back()->with('error', $e->getMessage());
    }
}


public function destroy($id)
{
    $user = Pendaftaran::findOrFail($id);
    $user->delete();

    return redirect('pendaftaran/show_pendaftaran')->with('success', 'Pendaftaran deleted successfully.');
}

    public function getKota(Request $request)
    {
        $kota = Kota::where('provinsi_id' ,'=', $request->provinsi_id)->get();

        return response()->json($kota);
    }

    public function cetakPdf($id){
        $pendaftaran = Pendaftaran::where('pendaftaran_id', $id)->with(['agama', 'kota_alamat','kota_lahir'])->first();

        $provinsi = Provinsi::where('provinsi_id', $pendaftaran->kota_alamat->kota_id)->first();

        // return $pendaftaran;
        $pdf = PDF::loadView('pendaftaran.cetak', ['pendaftaran' => $pendaftaran, 'provinsi'=> $provinsi]);
        return $pdf->download('hasil-cetak.pdf');
    }

}
