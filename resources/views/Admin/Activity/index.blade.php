@extends('Layout.Dashboard')

@section('content')
<div class="p-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-blue-900">Log Aktivitas</h1>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600">No</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600">User</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600">Aktivitas</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600">Waktu</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @foreach($activities as $item)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4">{{ $item->user->name ?? 'System' }}</td>
                    <td class="px-6 py-4">{{ $item->activity }}</td>
                    <td class="px-6 py-4">{{ $item->created_at->format('d M Y H:i:s') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
