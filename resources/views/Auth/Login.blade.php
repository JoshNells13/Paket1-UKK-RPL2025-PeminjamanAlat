@extends('Layout.Auth')

@section('title','Masuk')

@section('content')
    <div id="loginForm" class="bg-white rounded-lg shadow-2xl p-8 transform transition-all duration-300">
        <div class="text-center mb-8">
            <div class="inline-block bg-blue-100 p-4 rounded-full mb-4">
                <i class="fas fa-tools text-blue-600 text-3xl"></i>
            </div>
            <h1 class="text-3xl font-bold text-gray-800">Peminjaman Alat</h1>
            <p class="text-gray-500 text-sm mt-2">Sistem Manajemen Peminjaman</p>
        </div>

        <form action="{{ route('login') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Username</label>
                <div class="relative">
                    <i class="fas fa-user absolute left-4 top-3.5 text-gray-400"></i>
                    <input type="text" name="username" placeholder="Masukkan username"
                        class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                </div>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2">Password</label>
                <div class="relative">
                    <i class="fas fa-lock absolute left-4 top-3.5 text-gray-400"></i>
                    <input type="password" name="password" placeholder="Masukkan password"
                        class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                    <button type="button" class="absolute right-4 top-3.5 text-gray-400 hover:text-gray-600">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
            </div>



            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-lg transition transform hover:scale-105 active:scale-95">
                <i class="fas fa-sign-in-alt mr-2"></i> Login
            </button>
        </form>

        <div class="mt-6 relative">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-gray-300"></div>
            </div>
            <div class="relative flex justify-center text-sm">
                <span class="px-2 bg-white text-gray-500">atau</span>
            </div>
        </div>

        <p class="text-center mt-6 text-gray-600">
            Belum punya akun?
            <a href="{{ route('register.show') }}" class="text-blue-600 font-bold hover:text-blue-700 underline">
                Daftar di sini
            </a>
        </p>
    </div>
@endsection
