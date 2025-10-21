<div class="modern-card">
    <h6 class="modern-card-title mb-3">
        <i class="bi bi-clipboard2-data me-2"></i> Kondisi Barang
    </h6>

    @php
        $kondisis = [
            ['judul' => 'Baik', 'jumlah' => $jumlahBarang, 'kondisi' => $kondisiBaik, 'color' => 'success'],
            ['judul' => 'Rusak Ringan', 'jumlah' => $jumlahBarang, 'kondisi' => $kondisiRusakRingan, 'color' => 'warning'],
            ['judul' => 'Rusak Berat', 'jumlah' => $jumlahBarang, 'kondisi' => $kondisiRusakBerat, 'color' => 'danger'],
        ];
    @endphp

    <div class="kondisi-list">
        @foreach ($kondisis as $kondisi)
            <x-progress-kondisi :judul="$kondisi['judul']" :jumlah="$kondisi['jumlah']" :kondisi="$kondisi['kondisi']" :color="$kondisi['color']" />
        @endforeach
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

.kondisi-list {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}
</style>