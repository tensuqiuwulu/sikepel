@extends('layout.main')

@section('content')
<section class="bg-gray-100 pt-4">
    <div class="flex flex-col items-center justify-center px-6 mx-auto">
        @if (session()->has('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 shadow" role="alert">
            <p>{{ session('success') }}</p>
        </div>
        @endif
        <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
            <img class="w-8 h-8 mr-2" src="/img/Lambang_Kabupaten_Badung.png" alt="logo">
            Pemerintah Kabupaten Badung
        </a>
        <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-2xl xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    Tambah Ulasan
                </h1>
                <form class="space-y-4 md:space-y-6" action="{{ route('ulasan-store') }}" method="post">
                    <div>
                        <label for="keluhan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul keluhan : {{$keluhan->judul}}</label>
                    </div>
                    @csrf
                    <div>
                        <label for="ulasan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ulasan</label>
                        <textarea name="ulasan" id="ulasan" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Masukkan isi ulasan" rows="5" required></textarea>
                        @error('keluhan')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <h2 class="text-2xl font-semibold mb-4">Rating</h2>
                    <div class="flex space-x-2">
                        <div class="cursor-pointer" onclick="setRating(1)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" class="star-svg"></path>
                            </svg>
                        </div>
                        <div class="cursor-pointer" onclick="setRating(2)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" class="star-svg"></path>
                            </svg>
                        </div>
                        <div class="cursor-pointer" onclick="setRating(3)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" class="star-svg"></path>
                            </svg>
                        </div>
                        <div class="cursor-pointer" onclick="setRating(4)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" class="star-svg"></path>
                            </svg>
                        </div>
                        <div class="cursor-pointer" onclick="setRating(5)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" class="star-svg"></path>
                            </svg>
                        </div>
                    </div>
                    <input type="hidden" id="rating" name="rating" value="0">
                    <input type="hidden" id="id_keluhan" name="id_keluhan" value="{{$keluhan->id}}">
                    <p class="text-gray-500 mt-2" id="selectedRatingText">Pilih rating: 0</p>
                    <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>

<style>
    .star-svg {
        color: gray;
        /* Warna default abu-abu */
    }

    .star-svg.active {
        color: #f3da35;
        /* Warna yang berbeda saat di-klik */
    }
</style>

<script>
    let selectedRating = 0;

    function setRating(rating) {
        const stars = document.querySelectorAll('.star-svg');

        // Menghapus kelas 'active' dari semua bintang
        stars.forEach(star => star.classList.remove('active'));

        // Menambahkan kelas 'active' hanya ke bintang yang telah di-klik
        for (let i = 0; i < rating; i++) {
            stars[i].classList.add('active');
        }

        selectedRating = rating;
        document.getElementById('rating').value = rating;
        document.getElementById('selectedRatingText').innerText = `Pilih rating: ${rating}`;
    }
</script>
@endsection