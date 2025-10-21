<div class="modern-card mb-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h6 class="modern-card-title mb-0">
            <i class="bi bi-clock-history me-2"></i> Barang Terbaru
        </h6>
        <a href="{{ route('barang.index') }}" class="modern-link">
            Lihat Semua <i class="bi bi-arrow-right ms-1"></i>
        </a>
    </div>

    <div class="table-responsive">
        <table class="table modern-table align-middle mb-0">
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Lokasi</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($barangTerbaru as $barang)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="table-icon-box">
                                    <i class="bi bi-box-seam"></i>
                                </div>
                                <div>
                                    <div class="fw-semibold text-dark">{{ $barang->nama_barang }}</div>
                                    <small class="text-muted">{{ $barang->kategori->nama_kategori ?? '-' }}</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="location-tag">
                                <i class="bi bi-geo-alt"></i>
                                {{ $barang->lokasi->nama_lokasi ?? '-' }}
                            </span>
                        </td>
                        <td>
                            <span class="date-tag">
                                <i class="bi bi-calendar3"></i>
                                {{ \Carbon\Carbon::parse($barang->tanggal_pengadaan)->format('d M Y') }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center py-5">
                            <div class="empty-state-small">
                                <i class="bi bi-inbox"></i>
                                <p>Belum ada data barang</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<style>
.modern-card {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    padding: 1.5rem;
    transition: all 0.2s ease;
}

.modern-card:hover {
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
}

.modern-card-title {
    font-size: 1rem;
    font-weight: 600;
    color: #1e293b;
    display: flex;
    align-items: center;
}

.modern-card-title i {
    color: #3b82f6;
}

.modern-link {
    font-size: 0.875rem;
    color: #3b82f6;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.2s ease;
    display: flex;
    align-items: center;
    gap: 0.25rem;
}

.modern-link:hover {
    color: #2563eb;
}

.modern-link i {
    font-size: 0.75rem;
    transition: transform 0.2s ease;
}

.modern-link:hover i {
    transform: translateX(3px);
}

.modern-table {
    font-size: 0.875rem;
}

.modern-table thead {
    background: #f8fafc;
    border-bottom: 2px solid #e2e8f0;
}

.modern-table thead th {
    font-size: 0.8125rem;
    font-weight: 600;
    color: #64748b;
    padding: 0.875rem 1rem;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    border: none;
}

.modern-table tbody td {
    color: #334155;
    padding: 1rem;
    border-bottom: 1px solid #f1f5f9;
}

.modern-table tbody tr:last-child td {
    border-bottom: none;
}

.modern-table tbody tr:hover {
    background: #f8fafc;
}

.table-icon-box {
    width: 36px;
    height: 36px;
    background: #f1f5f9;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #64748b;
    font-size: 1rem;
}

.location-tag {
    display: inline-flex;
    align-items: center;
    gap: 0.375rem;
    padding: 0.375rem 0.75rem;
    background: #f0fdf4;
    color: #15803d;
    border-radius: 6px;
    font-size: 0.8125rem;
    font-weight: 500;
    border: 1px solid #bbf7d0;
}

.location-tag i {
    font-size: 0.875rem;
}

.date-tag {
    display: inline-flex;
    align-items: center;
    gap: 0.375rem;
    color: #64748b;
    font-size: 0.8125rem;
}

.date-tag i {
    font-size: 0.875rem;
}

.empty-state-small {
    padding: 2rem 1rem;
}

.empty-state-small i {
    font-size: 3rem;
    color: #cbd5e1;
    display: block;
    margin-bottom: 0.75rem;
}

.empty-state-small p {
    color: #64748b;
    margin: 0;
    font-size: 0.9375rem;
}

@media (max-width: 768px) {
    .modern-card {
        padding: 1rem;
    }
    
    .modern-table thead th,
    .modern-table tbody td {
        padding: 0.75rem;
        font-size: 0.8125rem;
    }
    
    .table-icon-box {
        width: 32px;
        height: 32px;
        font-size: 0.875rem;
    }
}
</style>