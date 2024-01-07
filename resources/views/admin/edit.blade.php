@extends('admin.layout')
@section('title', 'Edit Siswa')
@section('section')
    <div class="flex justify-center w-full">
        <div class="max-w-full p-6 rounded-md sm:p-10 bg-gray-900 text-gray-100">
            <div class="mb-8 text-center">
                <h1 class="my-3 text-4xl font-bold">Edit Data Mahasiswa</h1>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="list-item bg-transparent">
                        @foreach ($errors->all() as $error)
                            <li class="text-red-400 underline text-sm">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            </div>
            <form action="{{ route('Siswa.update', ['id'=> $siswa->id]) }}" method="POST" class="space-y-12" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="space-y-4">
                    <div>
                        <label for="nis" class="block mb-2 text-sm">Lembaga Mahasiswa</label>
                        <select id="lmb_siswa" name="lmb_siswa"
                            class="w-full px-3 py-2 border rounded-md border-gray-700 bg-gray-900 text-gray-100">
                            <option >--Pilih Lembaga Siswa--</option>
                            <option @selected($siswa->lmb_siswa == 'latiseducation') value="latiseducation">latiseducation</option>
                            <option @selected($siswa->lmb_siswa == 'tutorindonesia') value="tutorindonesia">tutorindonesia</option>
                        </select>
                    </div>
                    <div class="block">
                        <label for="nis" class="block mb-2 text-sm">NIS</label>
                        <input type="text" name="nis" id="nis" value="{{ $siswa->nis }}" placeholder="............"
                            class="w-full px-3 py-2 border rounded-md border-gray-700 bg-gray-900 text-gray-100">
                    </div>
                    <div class="block">
                        <label for="nama" class="block mb-2 text-sm">Nama</label>
                        <input type="text" name="nama" id="nama" value="{{ $siswa->nama }}" placeholder="..........."
                            class="w-full px-3 py-2 border rounded-md border-gray-700 bg-gray-900 text-gray-100">
                    </div>
                    <div class="block">
                        <label for="email" class="block mb-2 text-sm">Alamat Email</label>
                        <input type="email" name="email" id="email" value="{{ $siswa->email }}" placeholder="leroy@jenkins.com"
                            class="w-full px-3 py-2 border rounded-md border-gray-700 bg-gray-900 text-gray-100">
                    </div>
                    <div class="block">
                        <label for="foto" class="block mb-2 text-sm">Foto</label>
                        <input type="file" name="foto" id="foto" placeholder="leroy@jenkins.com"
                            class="w-full px-3 py-2 border rounded-md border-gray-700 bg-gray-900 text-gray-100">
                        <span class="text-xs text-white">*Kosongkan Jika Tidak Diganti</span>
                    </div>
                </div>
                <div class="space-y-2">
                    <div>
                        <button type="submit"
                            class="w-full px-8 py-3 font-semibold rounded-md bg-blue-400 text-gray-900">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
