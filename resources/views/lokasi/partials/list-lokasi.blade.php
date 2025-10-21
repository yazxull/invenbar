<x-table-list>
    <x-slot name="header">
        <tr>
            <th width="5%">#</th>
            <th width="25%">Nama Lokasi</th>
            <th width="20%">Jumlah Barang</th>
            <th width="30%">Petugas</th>
            @can('manage lokasi')
                <th width="20%">Aksi</th>
            @endcan
        </tr>
    </x-slot>

    @forelse ($lokasis as $index => $lokasi)
        <tr>
            <td class="text-center align-middle">{{ $lokasis->firstItem() + $index }}</td>
            
            <!-- Nama Lokasi -->
            <td class="align-middle">
                <div class="d-flex align-items-center gap-2">
                    <div class="lokasi-icon">
                        <i class="bi bi-geo-alt-fill"></i>
                    </div>
                    <div>
                        <strong>{{ $lokasi->nama_lokasi }}</strong>
                        <div class="text-muted small">Lokasi inventaris</div>
                    </div>
                </div>
            </td>

            <!-- Jumlah Barang dengan Dropdown -->
            <td class="align-middle">
                @if($lokasi->barang_count > 0)
                    <button class="btn-jumlah-barang" 
                            type="button" 
                            data-bs-toggle="collapse" 
                            data-bs-target="#barang-{{ $lokasi->id }}" 
                            aria-expanded="false">
                        <i class="bi bi-box-seam me-2"></i>
                        <strong>{{ $lokasi->barang_count }}</strong> Barang
                        <i class="bi bi-chevron-down ms-2 chevron-icon"></i>
                    </button>
                    
                    <!-- Dropdown List Barang -->
                    <div class="collapse mt-2" id="barang-{{ $lokasi->id }}">
                        <div class="dropdown-barang">
                            @foreach($lokasi->barang as $barang)
                                <div class="dropdown-barang-item">
                                    <i class="bi bi-box me-2"></i>
                                    <span>{{ $barang->nama_barang }}</span>
                                    <span class="badge-kode">{{ $barang->kode_barang }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <span class="badge-no-data">
                        <i class="bi bi-inbox me-1"></i>
                        Tidak ada barang
                    </span>
                @endif
            </td>

            <!-- Petugas -->
            <td class="align-middle">
                @php
                    $petugas = $lokasi->users->filter(function($user) {
                        return $user->isPetugas();
                    });
                @endphp
                
                @if($petugas->count() > 0)
                    <div class="petugas-list">
                        @foreach($petugas as $user)
                            <div class="petugas-badge">
                                <i class="bi bi-person-circle me-1"></i>
                                {{ $user->name }}
                            </div>
                        @endforeach
                    </div>
                @else
                    <span class="badge-no-data">
                        <i class="bi bi-person-x me-1"></i>
                        Belum ada petugas
                    </span>
                @endif
            </td>

            <!-- Aksi -->
            @can('manage lokasi')
                <td class="align-middle text-center">
                    <div class="d-flex gap-1 justify-content">
                        <x-tombol-aksi :href="route('lokasi.edit', $lokasi->id)" type="edit" />
                        <x-tombol-aksi :href="route('lokasi.destroy', $lokasi->id)" type="delete" />
                    </div>
                </td>
            @endcan
        </tr>
    @empty
        <tr>
            <td colspan="5" class="text-center">
                <div class="empty-state-table">
                    <i class="bi bi-geo-alt"></i>
                    <p>Data lokasi belum tersedia</p>
                </div>
            </td>
        </tr>
    @endforelse
</x-table-list>

<style>
/* Icon Lokasi */
.lokasi-icon {
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, #10b981, #059669);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.125rem;
    flex-shrink: 0;
}

/* Button Jumlah Barang */
.btn-jumlah-barang {
    display: inline-flex;
    align-items: center;
    padding: 0.5rem 1rem;
    background: #eff6ff;
    color: #3b82f6;
    border: 1px solid #bfdbfe;
    border-radius: 8px;
    font-size: 0.875rem;
    font-weight: 500;
    transition: all 0.2s ease;
    cursor: pointer;
}

.btn-jumlah-barang:hover {
    background: #dbeafe;
    border-color: #93c5fd;
    transform: translateY(-1px);
}

.btn-jumlah-barang:active {
    transform: translateY(0);
}

.btn-jumlah-barang strong {
    font-size: 1rem;
    font-weight: 700;
}

.btn-jumlah-barang .chevron-icon {
    font-size: 0.75rem;
    transition: transform 0.3s ease;
}

.btn-jumlah-barang[aria-expanded="true"] .chevron-icon {
    transform: rotate(180deg);
}

/* Dropdown Barang */
.dropdown-barang {
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    padding: 0.5rem;
    max-height: 300px;
    overflow-y: auto;
    animation: slideDown 0.3s ease;
}

@keyframes slideDown {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.dropdown-barang-item {
    display: flex;
    align-items: center;
    padding: 0.625rem 0.75rem;
    background: white;
    border: 1px solid #e2e8f0;
    border-radius: 6px;
    margin-bottom: 0.375rem;
    font-size: 0.875rem;
    color: #334155;
    transition: all 0.2s ease;
}

.dropdown-barang-item:last-child {
    margin-bottom: 0;
}

.dropdown-barang-item:hover {
    background: #f1f5f9;
    border-color: #cbd5e1;
    transform: translateX(4px);
}

.dropdown-barang-item i {
    color: #64748b;
    font-size: 1rem;
}

.badge-kode {
    margin-left: auto;
    padding: 0.25rem 0.625rem;
    background: #f1f5f9;
    color: #64748b;
    border-radius: 4px;
    font-size: 0.75rem;
    font-weight: 600;
}

/* Petugas List */
.petugas-list {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
}

.petugas-badge {
    display: inline-flex;
    align-items: center;
    padding: 0.5rem 0.875rem;
    background: #f0fdf4;
    color: #15803d;
    border: 1px solid #bbf7d0;
    border-radius: 8px;
    font-size: 0.8125rem;
    font-weight: 500;
    transition: all 0.2s ease;
}

.petugas-badge:hover {
    background: #dcfce7;
    transform: translateY(-1px);
}

.petugas-badge i {
    font-size: 1rem;
}

/* Badge No Data */
.badge-no-data {
    display: inline-flex;
    align-items: center;
    padding: 0.5rem 0.875rem;
    background: #f8fafc;
    color: #64748b;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    font-size: 0.8125rem;
    font-weight: 500;
}

.badge-no-data i {
    font-size: 0.875rem;
}

/* Empty State */
.empty-state-table {
    padding: 3rem 1rem;
    text-align: center;
}

.empty-state-table i {
    font-size: 3rem;
    color: #cbd5e1;
    margin-bottom: 0.75rem;
    display: block;
}

.empty-state-table p {
    color: #64748b;
    margin: 0;
    font-size: 0.9375rem;
}

/* Scrollbar untuk Dropdown */
.dropdown-barang::-webkit-scrollbar {
    width: 6px;
}

.dropdown-barang::-webkit-scrollbar-track {
    background: #f1f5f9;
    border-radius: 3px;
}

.dropdown-barang::-webkit-scrollbar-thumb {
    background: #cbd5e1;
    border-radius: 3px;
}

.dropdown-barang::-webkit-scrollbar-thumb:hover {
    background: #94a3b8;
}

/* Table Styling */
table tbody td {
    vertical-align: middle;
}

/* Responsive */
@media (max-width: 768px) {
    .lokasi-icon {
        width: 36px;
        height: 36px;
        font-size: 1rem;
    }
    
    .btn-jumlah-barang {
        padding: 0.375rem 0.75rem;
        font-size: 0.8125rem;
    }
    
    .btn-jumlah-barang strong {
        font-size: 0.875rem;
    }
    
    .petugas-badge {
        padding: 0.375rem 0.75rem;
        font-size: 0.75rem;
    }
    
    .dropdown-barang-item {
        font-size: 0.8125rem;
        padding: 0.5rem;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Menangani animasi chevron saat collapse
    const collapseButtons = document.querySelectorAll('.btn-jumlah-barang');
    
    collapseButtons.forEach(button => {
        const targetId = button.getAttribute('data-bs-target');
        const targetElement = document.querySelector(targetId);
        
        if (targetElement) {
            targetElement.addEventListener('show.bs.collapse', function() {
                button.setAttribute('aria-expanded', 'true');
            });
            
            targetElement.addEventListener('hide.bs.collapse', function() {
                button.setAttribute('aria-expanded', 'false');
            });
        }
    });
});
</script>