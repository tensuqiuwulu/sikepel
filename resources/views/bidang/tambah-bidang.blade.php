@extends('layout.main')

@section('content')
    <section class="bg-gray-100 pt-4">
        <div class="flex flex-col items-center justify-center px-6 mx-auto">
            @if (session()->has('success'))
                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 shadow"
                    role="alert">
                    <p>{{ session('success') }}</p>
                </div>
            @endif
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                <img class="w-8 h-8 mr-2" src="/img/Lambang_Kabupaten_Badung.png" alt="logo">
                Pemerintah Kabupaten Badung
            </a>
            <div
                class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-2xl xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Tambah Bidang
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="/bidang" method="post">
                        @csrf
                        <div>
                            <label for="nama_bidang"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Bidang</label>
                            <input type="text" name="nama_bidang" id="nama_bidang"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="Masukkan Nama Bidang" required value='{{ old('nama_bidang') }}'>
                            @error('nama_bidang')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="kepala_bidang"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kepala Bidang</label>
                            <input type="text" name="kepala_bidang" id="kepala_bidang"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="Masukkan Kepala Bidang" required value='{{ old('kepala_bidang') }}'>
                            @error('kepala_bidang')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="jumlah_pegawai"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah Pegawai</label>
                            <input type="number" name="jumlah_pegawai" id="jumlah_pegawai"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="Masukkan Jumlah Pegawai" required value='{{ old('jumlah_pegawai') }}'>
                            @error('jumlah_pegawai')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="no_telp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                                Telepon</label>
                            <input type="text" name="no_telp" id="no_telp"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="Masukkan Nomor Telepon" required value='{{ old('no_telp') }}'>
                            @error('no_telp')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
