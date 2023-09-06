@extends('layout.main')

@section('content')

<div class="flex justify-between items-center mb-2">
    <form class="flex gap-2" action="/ulasan" method="get">
        @csrf
        <input class="rounded" type="text" name="search" id="search" />
        <button type="submit" class="hover:bg-sky-800 duration-200 transition-all flex items-center gap-2 bg-sky-700 rounded text-white px-2 text-sm">Search</button>
    </form>
</div>

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
                    Judul
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Bidang
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Keluhan
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Status
                </th>
                @can('admin')
                <th scope="col" class="px-6 py-3 text-center">
                    Pengaju
                </th>
                @endcan
                <th scope="col" class="px-6 py-3 text-center">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($keluhan as $index => $k)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="p-4 px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                    {{ $keluhan->firstItem() + $index }}
                </th>
                <td class="px-6 py-4 text-center">
                    {{ $k->judul }}
                </td>
                <th class="px-6 py-4 text-center font-normal">
                    {{ $k->bidang->nama_bidang }}
                </th>
                <td class="px-6 py-4 text-center">
                    {{ $k->keluhan }}
                </td>
                <td class="px-6 py-4 text-center">
                    {{ $k->status }}
                </td>
                @can('admin')
                <td class="px-6 py-4 text-center">
                    {{ $k->user->name }}
                </td>
                @endcan

                <td class="px-6 py-4 text-center flex justify-center">
                    @if ($k->id_keluhan != null)
                    <a href="{{ route('ulasan-detail', ['id' => $k->id]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                        <img src="svg/detail.svg" alt="Detail" class="rounded" />
                    </a>
                    @endif
                    @if (auth()->user()->role != 'admin')
                    <a href="{{ route('ulasan-create', ['id' => $k->id]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                        <img src="svg/edit.svg" alt="Detail" class="rounded" />
                    </a>
                    @endif
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
    <nav class="p-4" aria-label="Table navigation">
        {{ $keluhan->links() }}
    </nav>
</div>
@endsection