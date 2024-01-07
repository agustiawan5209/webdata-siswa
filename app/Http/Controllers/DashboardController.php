<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $siswa = Siswa::when($search ?? null, function ($query, $search) {
            $query->where("lmb_siswa", "like", "%" . $search . "%");
            $query->orWhere("nis", "like", "%" . $search . "%");
            $query->orWhere("nama", "like", "%" . $search . "%");
            $query->orWhere("email", "like", "%" . $search . "%");
        })
            ->orderBy('id','desc')->paginate(5);
        return view("admin.dashboard", [
            'siswas' => $siswa,
            'search'=> $search,
        ]);
    }
}
