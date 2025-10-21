@php
    $totalData = $peminjamans->total();

    $sedangDipinjamCount = $peminjamans->filter(fn($item) => in_array($item->status, ['Sedang Dipinjam', 'Terlambat']))->count();
    $terlambatCount = $peminjamans->filter(fn($item) => $item->status === 'Terlambat')->count();
    $sudahDikembalikanCount = $peminjamans->filter(fn($item) => $item->status === 'Sudah Dikembalikan')->count();
@endphp

<style>
    .stat-card {
        display: flex;
        align-items: center;
        justify-content: space-between;
        border: 1px solid #e5e7eb;
        border-left: 4px solid transparent;
        border-radius: 10px;
        padding: 1rem;
        background-color: #fff;
        box-shadow: 0 2px 6px rgba(0,0,0,0.05);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .stat-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(0,0,0,0.08);
    }

    .icon-box {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 45px;
        height: 45px;
        border-radius: 10px;
        color: #fff;
        font-size: 22px;
        flex-shrink: 0;
    }

    .stat-info {
        margin-left: 10px;
    }

    .stat-title {
        font-size: 0.9rem;
        color: #6b7280;
        margin: 0;
    }

    .stat-number {
        font-weight: 700;
        font-size: 1.5rem;
        color: #111827;
        margin: 0;
    }

    /* Warna-warna kartu */
    .blue-card { border-left-color: #3b82f6; }
    .orange-card { border-left-color: #f59e0b; }
    .red-card { border-left-color: #ef4444; }
    .green-card { border-left-color: #10b981; }

    .blue-icon { background-color: #3b82f6; }
    .orange-icon { background-color: #f59e0b; }
    .red-icon { background-color: #ef4444; }
    .green-icon { background-color: #10b981; }
</style>

<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="stat-card blue-card">
            <div class="icon-box blue-icon">
                <i class="bi bi-clipboard-check"></i>
            </div>
            <div class="stat-info">
                <p class="stat-title mb-1">Total Peminjaman</p>
                <h3 class="stat-number">{{ $totalData }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="stat-card orange-card">
            <div class="icon-box orange-icon">
                <i class="bi bi-clock-history"></i>
            </div>
            <div class="stat-info">
                <p class="stat-title mb-1">Sedang Dipinjam</p>
                <h3 class="stat-number">{{ $sedangDipinjamCount }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="stat-card red-card">
            <div class="icon-box red-icon">
                <i class="bi bi-exclamation-triangle"></i>
            </div>
            <div class="stat-info">
                <p class="stat-title mb-1">Terlambat</p>
                <h3 class="stat-number">{{ $terlambatCount }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="stat-card green-card">
            <div class="icon-box green-icon">
                <i class="bi bi-check-circle"></i>
            </div>
            <div class="stat-info">
                <p class="stat-title mb-1">Sudah Dikembalikan</p>
                <h3 class="stat-number">{{ $sudahDikembalikanCount }}</h3>
            </div>
        </div>
    </div>
</div>
