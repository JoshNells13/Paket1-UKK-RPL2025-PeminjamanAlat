@extends('Layout.Auth')

@section('title','Daftar')

@section('content')
    <div id="registerForm" class="bg-white rounded-lg shadow-2xl p-8 transform transition-all duration-300">
        <div class="text-center mb-8">
            <div class="inline-block bg-blue-100 p-4 rounded-full mb-4">
                <i class="fas fa-user-plus text-blue-600 text-3xl"></i>
            </div>
            <h1 class="text-3xl font-bold text-gray-800">Buat Akun Baru</h1>
            <p class="text-gray-500 text-sm mt-2">Daftar untuk menggunakan sistem</p>
        </div>

        <form action="{{ route('register') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Nama</label>
                <div class="relative">
                    <i class="fas fa-user absolute left-4 top-3.5 text-gray-400"></i>
                    <input type="text" placeholder="Masukkan nama lengkap" name="name"
                        class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                </div>
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Username</label>
                <div class="relative">
                    <i class="fas fa-user absolute left-4 top-3.5 text-gray-400"></i>
                    <input type="text" placeholder="Pilih username" name="username"
                        class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                </div>
                <p class="text-xs text-gray-500 mt-1">Username harus 3-20 karakter</p>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2">Password</label>
                <div class="relative">
                    <i class="fas fa-lock absolute left-4 top-3.5 text-gray-400"></i>
                    <input type="password" placeholder="Buat password yang kuat" name="password"
                        class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                    <button type="button" class="absolute right-4 top-3.5 text-gray-400 hover:text-gray-600">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
            </div>

            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-lg transition transform hover:scale-105 active:scale-95">
                <i class="fas fa-user-plus mr-2"></i> Daftar
            </button>
        </form>

        <p class="text-center mt-6 text-gray-600">
            Sudah punya akun?
            <a href="{{ route('login.show') }}" class="text-blue-600 font-bold hover:text-blue-700 underline">
                Masuk di sini
            </a>
        </p>
    </div>
@endsection
