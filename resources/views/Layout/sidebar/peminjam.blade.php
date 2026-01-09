<a href="{{ route('peminjam.dashboard') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('peminjam.dashboard') ? 'bg-blue-700' : 'hover:bg-blue-600' }} rounded-lg transition">
    <i class="fas fa-chart-line"></i>
    <span>Dashboard</span>
</a>

<div class="mt-4 mb-2 text-xs text-blue-200 uppercase font-semibold pl-4">Menu</div>
<a href="{{ route('peminjam.tools') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('peminjam.tools') ? 'bg-blue-700' : 'hover:bg-blue-600' }} rounded-lg transition">
    <i class="fas fa-search"></i>
    <span>Cari Alat</span>
</a>
<a href="{{ route('peminjam.borrowings.index') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('peminjam.borrowings') ? 'bg-blue-700' : 'hover:bg-blue-600' }} rounded-lg transition">
    <i class="fas fa-history"></i>
    <span>Riwayat Peminjaman</span>
</a>
<a href="{{ route('peminjam.return-tools.create') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('peminjam.return-tools.*') ? 'bg-blue-700' : 'hover:bg-blue-600' }} rounded-lg transition">
    <i class="fas fa-undo"></i>
    <span>Riwayat Pengembalian</span>
</a>
