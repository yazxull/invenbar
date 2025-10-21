@php
    use Illuminate\Support\Facades\Auth;
    use App\Models\Perbaikan;

    $user = Auth::user();

    $query = Perbaikan::query()->with('barang.lokasi');

    if ($user->hasRole('petugas') && $user->lokasi_id) {
        $query->whereHas('barang', function ($q) use ($user) {
            $q->where('lokasi_id', $user->lokasi_id);
        });
    }

    $totalPerbaikan = (clone $query)->count();
    $menunggu = (clone $query)->where('status', 'Menunggu')->count();
    $dalamPerbaikan = (clone $query)->where('status', 'Dalam Perbaikan')->count();
    $selesai = (clone $query)->where('status', 'Selesai')->count();
    $totalBiaya = (clone $query)->where('status', 'Selesai')->sum('biaya_perbaikan');
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

    /* Warna kartu */
    .blue-card { border-left-color: #3b82f6; }
    .orange-card { border-left-color: #f59e0b; }
    .cyan-card { border-left-color: #06b6d4; }
    .green-card { border-left-color: #10b981; }

    .blue-icon { background-color: #3b82f6; }
    .orange-icon { background-color: #f59e0b; }
    .cyan-icon { background-color: #06b6d4; }
    .green-icon { background-color: #10b981; }
</style>

<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="stat-card blue-card">
            <div class="icon-box blue-icon">
                <i class="bi bi-tools"></i>
            </div>
            <div class="stat-info">
                <p class="stat-title mb-1">Total Perbaikan</p>
                <h3 class="stat-number">{{ $totalPerbaikan }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="stat-card orange-card">
            <div class="icon-box orange-icon">
                <i class="bi bi-hourglass-split"></i>
            </div>
            <div class="stat-info">
                <p class="stat-title mb-1">Menunggu</p>
                <h3 class="stat-number">{{ $menunggu }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="stat-card cyan-card">
            <div class="icon-box cyan-icon">
                <i class="bi bi-gear-wide-connected"></i>
            </div>
            <div class="stat-info">
                <p class="stat-title mb-1">Dalam Perbaikan</p>
                <h3 class="stat-number">{{ $dalamPerbaikan }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="stat-card green-card">
            <div class="icon-box green-icon">
                <i class="bi bi-check-circle"></i>
            </div>
            <div class="stat-info">
                <p class="stat-title mb-1">Selesai</p>
                <h3 class="stat-number">{{ $selesai }}</h3>
                <small class="text-muted">Biaya: Rp {{ number_format($totalBiaya, 0, ',', '.') }}</small>
            </div>
        </div>
    </div>
</div>
