@extends('layout.main')

@section('content')
    <section>
        <div class="flex justify-center gap-2 flex-wrap">
            <button class="bg-slate-800 rounded card text-white flex justify-center gap-24 items-center">
                <div class="text-left">
                    <h3 class="text-2xl font-semibold mb-2">Pengguna</h3>
                    <p>1000</p>
                </div>
                <div>
                    <img src="/svg/user.svg" class="dashboard-icon">
                </div>
            </button>
            <button class="bg-slate-800 rounded card text-white flex justify-center gap-24 items-center">
                <div class="text-left">
                    <h3 class="text-2xl font-semibold mb-2">Keluhan</h3>
                    <p>1000</p>
                </div>
                <div>
                    <img src="/svg/keluhan.svg" class="dashboard-icon">
                </div>
            </button>
            <button class="bg-slate-800 rounded card text-white flex justify-center gap-24 items-center">
                <div class="text-left">
                    <h3 class="text-2xl font-semibold mb-2">Teknisi</h3>
                    <p>1000</p>
                </div>
                <div>
                    <img src="/svg/teknisi.svg" class="dashboard-icon">
                </div>
            </button>
    </section>
@endsection
