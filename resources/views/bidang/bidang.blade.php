@extends('layout.main')

@section('content')
@can('admin')
<div class="flex justify-between items-center mb-2">
    <form class="flex gap-2" action="/bidang" method="get">
        @csrf
        <input class="rounded" type="text" name="search" id="search" />
        <button type="submit" class="hover:bg-sky-800 duration-200 transition-all flex items-center gap-2 bg-sky-700 rounded text-white px-2 text-sm">Search</button>
    </form>
    <form action="/bidang/create" method="get">
        @csrf
        <button type="submit" class="hover:bg-green-700 duration-200 transition-all flex items-center gap-2 bg-green-600 rounded text-white py-2 px-2 text-sm"><img src="/svg/plus.svg" alt="plus image" width="10px" height="10px" /><span>Tambah
                Bidang</span></button>
    </form>
</div>
@endcan
@if (session()->has('success'))
<div class="shadow p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
    {{ session('success') }}
</div>
@endif
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 p-2 border">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 text-center">
                    No
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Nama Bidang
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Kepala Bidang
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Jumlah Pegawai
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    No Telepon
                </th>
                @can('admin')
                <th scope="col" class="px-6 py-3 text-center">
                    Action
                </th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @foreach ($bidang as $index => $b)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="p-4 px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                    {{ $bidang->firstItem() + $index }}
                </th>
                <th class="px-6 py-4 text-center font-normal">
                    {{ $b->nama_bidang }}
                </th>
                <td class="px-6 py-4 text-center">
                    {{ $b->kepala_bidang }}
                </td>
                <td class="px-6 py-4 text-center">
                    {{ $b->jumlah_pegawai }}
                </td>
                <td class="px-6 py-4 text-center">
                    {{ $b->no_telp }}
                </td>
                @can('admin')
                <td class="px-6 py-4 text-center flex justify-center">
                    <a href="/bidang/{{ $b->id }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                        <img src="svg/detail.svg" alt="Detail" class="rounded" />
                    </a>
                    <a href="/bidang/{{ $b->id }}/edit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                        <img src="svg/edit.svg" alt="Detail" class="rounded" />
                    </a>
                </td>
                @endcan
            </tr>
            @endforeach
        </tbody>
    </table>
    <nav class="p-4" aria-label="Table navigation">
        {{ $bidang->links() }}
    </nav>
</div>
@endsection