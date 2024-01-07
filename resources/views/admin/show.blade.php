@extends('admin.layout')
@section('title', 'Detail Siswa')
@section('section')
<div class="grid place-items-center pt-10">
    <div class="flex flex-col w-full sm:w-[400px] md:w-[600px] p-6 space-y-6 overflow-hidden rounded-lg shadow-md bg-gray-900 text-gray-100">
        <div class="">
            <div>
                <img src="{{ $siswa->foto_path }}" alt="" class="object-cover w-full mb-4 h-60 sm:h-96 bg-gray-500">
            <h2 class="mb-1 text-xl font-semibold">Data Siswa {{ $siswa->nama }}</h2>
            </div>
            <table>
                <tr>
                    <td>Lembaga Siswa</td>
                    <td>: {{ $siswa->lmb_siswa }}</td>
                </tr>
                <tr>
                    <td>NIS</td>
                    <td>: {{ $siswa->nis }}</td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>: {{ $siswa->nama }}</td>
                </tr>
                <tr>
                    <td>Alamat Email</td>
                    <td>: {{ $siswa->email }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
