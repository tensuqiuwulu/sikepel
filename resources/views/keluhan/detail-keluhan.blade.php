@extends('layout.main')

@section('content')
<section class="bg-gray-100 pt-4">
    <div class="flex flex-col items-center justify-center px-6 mx-auto">
        <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
            <img class="w-8 h-8 mr-2" src="/img/Lambang_Kabupaten_Badung.png" alt="logo">
            Pemerintah Kabupaten Badung
        </a>
        <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-2xl xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <div>
                    <label for="judul" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul</label>
                    <input type="text" name="judul" id="judul" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" disabled value='{{ $data['keluhan']->judul }}'>
                    @error('judul')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="bidang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih
                        Bidang</label>
                    <select name="id_bidang" id="bidang" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled>
                        <option></option>
                        @foreach ($data['bidang'] as $bidang)
                        <option value="{{ $bidang->id }}" @if ($data['keluhan']->bidang->id == $bidang->id) selected @endif>
                            {{ $bidang->nama_bidang }}
                        </option>
                        @endforeach
                    </select>
                    @error('id_bidang')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">Harap masukkan bidang</p>
                    @enderror
                </div>
                <div>
                    <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                    <select name="status" id="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled>
                        <option value="Belum Diproses" @if ($data['keluhan']->status == 'Belum Diproses') selected @endif>Belum
                            Diproses</option>
                        <option value="Sedang Diproses" @if ($data['keluhan']->status == 'Sedang Diproses') selected @endif>Sedang
                            Diproses</option>
                        <option value="Sudah Diproses" @if ($data['keluhan']->status == 'Sudah Diproses') selected @endif>Sudah
                            Diproses</option>
                    </select>
                    @error('status')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">Harap masukkan bidang</p>
                    @enderror
                </div>
                <div>
                    <label for="keluhan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keluhan</label>
                    <textarea name="keluhan" id="keluhan" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" rows="5" disabled>{{ $data['keluhan']->keluhan }}</textarea>
                    @error('keluhan')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</section>
@endsection