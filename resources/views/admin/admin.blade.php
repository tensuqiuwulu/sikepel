@extends('layout.main')

@section('content')
<div class="flex justify-between items-center mb-2">
    <form class="flex gap-2" action="/admin" method="get">
        @csrf
        <input class="rounded" type="text" name="search" id="search" />
        <button type="submit" class="hover:bg-sky-800 duration-200 transition-all flex items-center gap-2 bg-sky-700 rounded text-white px-2 text-sm">Search</button>
    </form>
    <form action="/admin/create" method="get">
        @csrf
        <button type="submit" class="hover:bg-green-700 duration-200 transition-all flex items-center gap-2 bg-green-600 rounded text-white py-2 px-2 text-sm"><img src="/svg/plus.svg" alt="plus image" width="10px" height="10px" /><span>Tambah
                Admin</span></button>
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
                    Nama
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Phone
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Alamat
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Email
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Status
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admin as $index => $b)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="p-4 px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                    {{ $admin->firstItem() + $index }}
                </th>
                <th class="px-6 py-4 text-center font-normal">
                    {{ $b->name }}
                </th>
                <td class="px-6 py-4 text-center">
                    {{ $b->phonenumber }}
                </td>
                <td class="px-6 py-4 text-center">
                    {{ $b->alamat }}
                </td>
                <td class="px-6 py-4 text-center">
                    {{ $b->email }}
                </td>
                @if ($b->status == 1)
                <td>Aktif</td>
                @elseif ($b->status == 2)
                <td>Tidak Aktif</td>
                @endif
                <td class="px-6 py-4 text-center flex justify-center">
                    <a href="/admin/{{ $b->id }}/edit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                        <img src="svg/edit.svg" alt="Detail" class="rounded" />
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <nav class="p-4" aria-label="Table navigation">
        {{ $admin->links() }}
    </nav>
</div>
@endsection