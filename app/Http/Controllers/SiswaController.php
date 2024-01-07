<?php

namespace App\Http\Controllers;

use App\Exports\SiswaExport;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{

    public function create()
    {
        return view('admin.form');
    }


    /**
     * store
     *  Buat Model Siswa
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'lmb_siswa' => 'required|in:latiseducation,tutorindonesia',
            'nis' => 'required|string|max:20',
            'nama' => 'required|string|max:50',
            'email' => 'required|email|unique:siswas,email|max:50',
            'foto' => 'required|images|mimes:png,jpg|max:100',
        ]);
        // Masukkan Semua Request Dalam Variabel Data
        $data = $request->all();

        // Dapatkan Extensi Foto
        $ext = $request->file('foto')->getClientOriginalExtension();

        // Buat Sebuah Nama Foto Baru
        $namaFoto = md5($request->file('foto')->getClientOriginalName()) . '.' . $ext;

        // Simpan Foto Dalam Folder Siswa
        $request->file('foto')->storeAs('public/siswa/', $namaFoto);

        // Ganti Key Foto dalam Array Dengan Variabel namaFoto
        $data['foto'] = $namaFoto;

        // Simpan Request Kedalam Model Siswa
        $siswa = Siswa::create($data);

        // Kembali Ke halaman dashboard
        return redirect()->route('dashboard')->with('success', 'Berhasil Di Tambah');
    }

    public function show($id){
        return view('admin.show', [
            'siswa' => Siswa::find($id),
        ]);
    }

    public function edit(Request $request, $id)
    {
        return view('admin.edit', [
            'siswa' => Siswa::find($id),
        ]);
    }

    /**
     * update
     *  Update Model Siswa
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        $valid = Validator::make($request->all(), [
            'lmb_siswa' => 'required|in:latiseducation,tutorindonesia',
            'nis' => 'required|string|max:20',
            'nama' => 'required|string|max:50',
            'email' => 'required|email|max:50',
            'foto' => 'nullable|images|mimes:png,jpg|max:100',
        ]);

        $siswa = Siswa::find($id);

        // Cek Foto Jika Request Ada
        if ($request->exists('foto')) {
            $foto = $request->file('foto');
            $ext = '.' . $foto->getClientOriginalExtension();
            $namaFoto = $foto->getClientOriginalName() . $ext;

            // Cek Jika DalamFolder Terdapat Foto
            if (Storage::exists('public/siswa/' . $siswa->foto)) {
                // Hapus Foto
                Storage::delete('public/siswa/' . $siswa->foto);
                // Update Foto
                $siswa->update(['foto' => $namaFoto]);
            }
        }
        $siswa->update([
            'lmb_siswa' => $request->lmb_siswa,
            'nis' => $request->nis,
            'nama' => $request->nama,
            'email' => $request->email,
        ]);

        return redirect()->route('dashboard')->with('success', 'Berhasil Di Update');
    }

    public function delete(Request $request, $id)
    {
        $siswa = Siswa::find($id);
        // Cek Jika DalamFolder Terdapat Foto
        if (Storage::exists('public/siswa/' . $siswa->foto)) {
            // Hapus Foto
            Storage::delete('public/siswa/' . $siswa->foto);
        }
        $siswa->delete();

        return redirect()->route('dashboard')->with('success', 'Berhasil Di Hapus');
    }

    // Fungsi Export Data Siswa
    public function export(Request $request)
    {
        return Excel::download(new SiswaExport($request->search), 'data-export.xlsx');
    }
}
