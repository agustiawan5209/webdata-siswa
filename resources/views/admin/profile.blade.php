@extends('admin.layout')
@section('title', 'Profile')
@section('section')
    <div class="grid place-items-center pt-10">
        <div
            class="flex flex-col w-full sm:w-[400px] md:w-[600px] p-6 space-y-6 overflow-hidden rounded-lg shadow-md bg-gray-900 text-gray-100">
            <div class="">
                <table class="table">
                    <tr>
                        <td class="p-4">Nama</td>
                        <td class="p-4">: Agustiawan</td>
                    </tr>
                    <tr>
                        <td class="p-4">Position kandidat</td>
                        <td class="p-4">: IT FullStack</td>
                    </tr>
                    <tr>
                        <td class="p-4">Image Kandidat</td>
                        <td class="p-4"><img src="{{ asset('img/foto_profile.jpg') }}" class="rounded-lg object-cover" width="200" alt=""></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
