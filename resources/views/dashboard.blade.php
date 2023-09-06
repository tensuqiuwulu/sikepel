@extends('layout.main')

@section('content')
<div class="px-4 pt-8">
    <div class="mt-6 flex flex-wrap gap-6 justify-center">
        <div class="bg-white border border-gray-200 rounded-lg m-4 p-6 w-64 h-64 max-w-xs max-h-xs shadow-md">
            <h3 class="text-xl font-semibold mb-4">Jumlah Keluhan</h3>
            <p><b>{{$total}}</b> Keluhan</p>
        </div>

        <div class="bg-white border border-gray-200 rounded-lg m-4 p-6 w-64 h-64 max-w-xs max-h-xs shadow-md">
            <h3 class="text-xl font-semibold mb-4">Belum Diproses</h3>
            <p><b>{{$total_belum}}</b> Keluhan</p>
        </div>

        <div class="bg-white border border-gray-200 rounded-lg m-4 p-6 w-64 h-64 max-w-xs max-h-xs shadow-md">
            <h3 class="text-xl font-semibold mb-4">Sedang Diproses</h3>
            <p><b>{{$total_sedang}}</b> Keluhan</p>
        </div>

        <div class="bg-white border border-gray-200 rounded-lg m-4 p-6 w-64 h-64 max-w-xs max-h-xs shadow-md">
            <h3 class="text-xl font-semibold mb-4">Sudah Diproses</h3>
            <p><b>{{$total_sudah}}</b> Keluhan</p>
        </div>
    </div>


</div>
@endsection