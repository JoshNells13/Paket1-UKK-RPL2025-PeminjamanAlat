@extends('Layout.Dashboard')

@section('content')
    <div class="p-8 max-w-lg">
        <h1 class="text-2xl font-bold text-blue-900 mb-6">Edit Peminjaman</h1>

        <form action="{{ route('admin.borrowings.update', $borrowing) }}" method="POST"
            class="bg-white p-6 rounded-lg shadow">
            @csrf
            @method('PUT')

            <!-- Read-only Info -->
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-2 font-semibold text-gray-600">Peminjam</label>
                    <div class="bg-gray-100 p-2 rounded">{{ $borrowing->user->name }}</div>
                </div>
                <div>
                    <label class="block mb-2 font-semibold text-gray-600">Alat</label>
                    <div class="bg-gray-100 p-2 rounded">{{ $borrowing->tool->name }}</div>
                </div>
            </div>

            <div class="mb-4">
                <label class="block mb-2 font-semibold">Tanggal Pinjam</label>
                <input type="date" name="borrow_date" value="{{ $borrowing->borrow_date }}"
                    class="w-full border rounded px-4 py-2 focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="mb-4">
                <label class="block mb-2 font-semibold">Tanggal Kembali</label>
                <input type="date" name="return_date" value="{{ $borrowing->return_date }}"
                    class="w-full border rounded px-4 py-2 focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="mb-4">
                <label class="block mb-2 font-semibold">Status</label>
                <select name="status" class="w-full border rounded px-4 py-2 focus:ring-2 focus:ring-blue-500" required>
                    <option value="menunggu" {{ $borrowing->status === 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                    <option value="dipinjam" {{ $borrowing->status === 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                    <option value="dikembalikan" {{ $borrowing->status === 'dikembalikan' ? 'selected' : '' }}>Selesai
                    </option>
                </select>

            </div>

            <div class="mt-6 flex justify-end gap-2">
                <a href="{{ route(auth()->user()->role->name . '.borrowings.index') }}"
                    class="px-4 py-2 border rounded hover:bg-gray-50">Batal</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Update</button>
            </div>
        </form>
    </div>
@endsection
