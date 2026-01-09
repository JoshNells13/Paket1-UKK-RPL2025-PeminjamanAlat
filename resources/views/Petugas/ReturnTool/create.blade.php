@extends('Layout.Dashboard')

@section('content')
    <div class="p-8 max-w-lg">
        <h1 class="text-2xl font-bold text-blue-900 mb-6">Kembalikan Alat</h1>

        <div class="bg-white p-6 rounded-lg shadow">

            <div class="mb-6 p-4 bg-blue-50 rounded border border-blue-100">
                <h3 class="font-bold text-blue-800 mb-2">Detail Peminjaman</h3>
                <p class="text-sm text-gray-700"><span class="font-semibold">Alat:</span> {{ $borrowing->tool->name }}</p>
                <p class="text-sm text-gray-700"><span class="font-semibold">Tgl Pinjam:</span>
                    {{ date('d M Y', strtotime($borrowing->borrow_date)) }}</p>
                <p class="text-sm text-gray-700"><span class="font-semibold">Tgl Kembali (Rencana):</span>
                    {{ date('d M Y', strtotime($borrowing->return_date)) }}</p>
            </div>

            <form action="{{ route('petugas.return-tools.store') }}" method="POST">
                @csrf
                <input type="hidden" name="borrowing_id" value="{{ $borrowing->id }}">

                <div class="mb-4">
                    <label class="block mb-2 font-semibold">Tanggal Pengembalian</label>
                    <input type="date" name="returned_at"
                        class="w-full border rounded px-4 py-2 focus:ring-2 focus:ring-blue-500" value="{{ date('Y-m-d') }}"
                        required>
                    @error('returned_at')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block mb-2 font-semibold">Kondisi Alat</label>
                    <select name="fine" class="w-full border rounded px-4 py-2 focus:ring-2 focus:ring-blue-500"
                        required>
                        <option value="">Pilih Kondisi</option>
                        <option value="1">Bagus / Baik</option>
                        <option value="0">Rusak</option>
                        <option value="0">Hilang</option>
                    </select>
                    @error('fine')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block mb-2 font-semibold">Catatan (Opsional)</label>
                    <textarea name="note" rows="3" class="w-full border rounded px-4 py-2 focus:ring-2 focus:ring-blue-500"></textarea>
                    @error('note')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6 flex justify-end gap-2">
                    <a href="{{ route('petugas.return-tools.index') }}"
                        class="px-4 py-2 border rounded hover:bg-gray-50">Batal</a>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        Proses Pengembalian
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
