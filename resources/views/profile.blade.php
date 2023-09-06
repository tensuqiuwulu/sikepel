@extends('layout.main')

@section('content')
@if (session()->has('success'))
<div class="shadow p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
    {{ session('success') }}
</div>
@endif
<div class="max-w-md mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
    <div class="bg-gray-200 h-32 flex items-center justify-center">
        <img src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="Foto Profil" class="rounded-full w-32 h-32">
    </div>
    <div class="px-6 py-4">
        <h2 class="text-xl font-semibold text-gray-800">{{$user->name}}</h2>
        <p class="text-gray-600">Role: {{$user->role}}</p>
        <p class="text-gray-600">Alamat: {{$user->alamat}}</p>
        <p class="text-gray-600">Email: {{$user->email}}</p>
        <p class="text-gray-600">Phone: {{$user->phonenumber}}</p>
    </div>
</div>
<form action="/edit-profile" method="get" class="mt-4">
    @csrf
    <button type="submit" class="hover:bg-orange-700 duration-200 transition-all flex items-center gap-2 bg-green-600 rounded text-white py-2 px-2 text-sm"> <img src="svg/edit.svg" alt="Detail" class="rounded" /><span>Ubah Profile</span></button>
</form>
@endsection