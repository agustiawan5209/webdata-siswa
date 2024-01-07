<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $siswa = Siswa::paginate(10);
        // dd(Siswa::find(1)->foto_path);
        return view("admin.dashboard", [
            'siswas'=> $siswa,
        ]);
    }
}
