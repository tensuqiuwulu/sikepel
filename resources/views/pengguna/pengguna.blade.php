@extends('layout.main')

@section('content')
<div class="flex justify-between items-center mb-2">
    <form class="flex gap-2" action="/admin" method="get">
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
            </tr>
        </thead>
        <tbody>
            @foreach ($pengguna as $index => $b)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="p-4 px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                    {{ $pengguna->firstItem() + $index }}
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
            </tr>
            @endforeach
        </tbody>
    </table>
    <nav class="p-4" aria-label="Table navigation">
        {{ $pengguna->links() }}
    </nav>
</div>
@endsection