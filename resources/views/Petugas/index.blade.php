@extends('Layout.Dashboard')

@section('content')
    <div class="flex-1 overflow-auto p-8">
        <!-- Statistics Cards -->
        <h1 class="text-2xl font-bold text-blue-900 mb-6">Selamat Datang, {{ Auth::user()->name }}</h1>
    </div>
@endsection
