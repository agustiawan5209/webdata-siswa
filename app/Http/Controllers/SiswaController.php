<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    public function create(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'lmb_siswa' => 'in:latiseducation,tutorindonesia',
            'nis' => 'required|string|max:20',
            'nama' => 'required|string|max:50',
            'email' => 'required|email|unique:siswas,email|max:50',
            'foto' => 'required|images|mimes:png,jpg|max:100',
        ]);
        $siswa = Siswa::create($request->all());
        return redirect()->route('dashboard')->with('success', 'Berhasil Di Tambah');

    }

    public function update(Request $request, $id)
    {
        $valid = Validator::make($request->all(), [
            'lmb_siswa' => 'in:latiseducation,tutorindonesia',
            'nis' => 'required|string|max:20',
            'nama' => 'required|string|max:50',
            'email' => 'required|email|max:50',
            'foto' => 'required|images|mimes:png,jpg|max:100',
        ]);

        $siswa = Siswa::find($id)->update($request->all());

        return redirect()->route('dashboard')->with('success', 'Berhasil Di Update');
    }

    public function delete(Request $request, $id)
    {
        $siswa = Siswa::find($id)->delete();

        return redirect()->route('dashboard')->with('success', 'Berhasil Di Hapus');
    }
}
