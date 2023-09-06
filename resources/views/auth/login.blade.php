<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <main>
        <div class="lg:flex justify-center items-center gap-10">
            {{-- Gambar Bupati --}}
            <div class="bupati-img hidden lg:block"></div>

            <!-- FORM CONTAINER BEGIN -->
            <div class="mt-12">
                <div class="flex flex-col items-center">
                    <!-- Company Logo -->
                    <div class="text-center mb-3 mt-5">
                        <img src="img/Lambang_Kabupaten_Badung.png" width="120px">
                    </div>
                    <div class="text-center mb-1">
                        <h5 class="font-semibold text-2xl">DINAS KOMINFO KABUPATEN BADUNG</h5>
                        <h6 class="text-xl">Penilaian Kepuasan Kinerja Dinas Kominfo</h6>
                        <h4 class="text-center font-bold text-2xl text-sky-600 my-2">LOGIN</h4>
                    </div>
                    <!-- Form -->
                    @if (session()->has('loginError'))
                        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            {{ session('loginError') }}
                        </div>
                    @endif
                    <form action="login" method="post">
                        @csrf
                        <form class="px-3">
                            <!-- Input Box -->
                            <div class="form-input">
                                <span><i class="fa fa-envelope form-icon"></i></span>
                                <input type="text" name="email" placeholder="Email" class="rounded">
                            </div>
                            <div class="form-input">
                                <span><i class="fa fa-lock form-icon"></i></span>
                                <input type="password" name="password" placeholder="Password" class="rounded">
                            </div>
                            <div class="mb-3">
                                <!--Remember Checkbox -->
                                <input type="checkbox" id="cb1"
                                    class="rounded duration-150 outline-none focus:ring-transparent">
                                <label class="custom-control-label" for="cb1">Remember me</label>
                            </div>

                            <!-- Login Button -->
                            <div class="mb-3">
                                <button type="submit"
                                    class="btn-login bg-sky-600 py-2 rounded text-white duration-150 ease-in-out hover:bg-sky-900"
                                    value="LOGIN">Login</button>
                            </div>
                            <!-- Forget Password -->
                            <div class="text-right">
                                <a href="reset.html" class="block text-sky-600 mb-2">Forgot password?</a>
                            </div>

                            <div class="text-center mb-5" style="color: #777;">Don't have an account?
                                <a class="text-sky-600" href="/registration">Register here</a>
                            </div>
                        </form>
                </div>
                <!-- FORM END -->
            </div>

    </main>
</body>

</html>
