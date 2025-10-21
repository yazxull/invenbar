<div class="row g-3 mb-4">
    @php
    $kartus = [
        [
            'text' => 'TOTAL BARANG',
            'total' => $jumlahBarang,
            'route' => 'barang.index',
            'icon' => 'bi-box-seam',
            'color' => 'primary',
        ],
        [
            'text' => 'TOTAL KATEGORI',
            'total' => $jumlahKategori,
            'route' => 'kategori.index',
            'icon' => 'bi-tag',
            'color' => 'secondary',
        ],
        [
            'text' => 'TOTAL LOKASI',
            'total' => $jumlahLokasi,
            'route' => 'lokasi.index',
            'icon' => 'bi-geo-alt',
            'color' => 'success',
            'role' => 'admin',
        ],
        [
            'text' => 'TOTAL PEMINJAMAN',
            'total' => $totalPeminjaman,
            'route' => 'peminjaman.index',
            'icon' => 'bi-journal-check',
            'color' => 'info',
        ],
        [
            'text' => 'TOTAL PERBAIKAN',
            'total' => $totalPerbaikan,
            'route' => 'perbaikan.index',
            'icon' => 'bi-tools',
            'color' => 'warning',
        ],
        [
            'text' => 'TOTAL USER',
            'total' => $jumlahUser,
            'route' => 'user.index',
            'icon' => 'bi-people',
            'color' => 'danger',
            'role' => 'admin',
        ],
    ];
    @endphp

    @foreach ($kartus as $kartu)
        @if(!isset($kartu['role']) || auth()->user()->hasRole($kartu['role']))
            <x-kartu-total 
                :text="$kartu['text']" 
                :route="$kartu['route']" 
                :total="$kartu['total']" 
                :icon="$kartu['icon']" 
                :color="$kartu['color']" 
            />
        @endif
    @endforeach
</div>