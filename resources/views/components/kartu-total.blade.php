@props(['text', 'total', 'route', 'icon', 'color'])

@php
    $colorMap = [
        'primary' => '#3b82f6',
        'secondary' => '#64748b',
        'success' => '#10b981',
        'info' => '#06b6d4',
        'warning' => '#f59e0b',
        'danger' => '#ef4444',
    ];
    $iconColor = $colorMap[$color] ?? '#64748b';
@endphp

<div class="col-xl-3 col-md-6 mb-3">
    <a href="{{ route($route) }}" class="text-decoration-none">
        <div class="kartu-modern" style="border-left-color: {{ $iconColor }};">
            <div class="kartu-icon-modern" style="background-color: {{ $iconColor }};">
                <i class="bi {{ $icon }}"></i>
            </div>

            <div class="kartu-content-modern">
                <div class="kartu-label-modern">{{ $text }}</div>
                <div class="kartu-value-modern">{{ $total }}</div>

                <div class="kartu-link-modern">
                    <span>Lihat Selengkapnya</span>
                    <i class="bi bi-arrow-right-circle"></i>
                </div>
            </div>

            <div class="kartu-decoration-modern">
                <div class="circle-1-modern" style="border-color: {{ $iconColor }}30;"></div>
                <div class="circle-2-modern" style="border-color: {{ $iconColor }}25;"></div>
            </div>
        </div>
    </a>
</div>

<style>
.kartu-modern {
    position: relative;
    display: flex;
    align-items: center;
    gap: 1rem;
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-left: 5px solid;
    border-radius: 10px;
    padding: 1.25rem;
    transition: all 0.3s ease;
    overflow: hidden;
    min-height: 130px;
}

.kartu-modern:hover {
    transform: translateY(-3px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    border-color: #cbd5e1;
}

.kartu-modern:hover .kartu-decoration-modern {
    opacity: 1;
}

.kartu-icon-modern {
    width: 50px;
    height: 50px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    color: #ffffff;
    flex-shrink: 0;
    transition: transform 0.3s ease;
}

.kartu-modern:hover .kartu-icon-modern {
    transform: scale(1.08);
}

.kartu-content-modern {
    flex: 1;
    position: relative;
    z-index: 2;
}

.kartu-label-modern {
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    color: #64748b;
    margin-bottom: 0.25rem;
    letter-spacing: 0.05em;
}

.kartu-value-modern {
    font-size: 2rem;
    font-weight: 700;
    color: #1e293b;
    line-height: 1.1;
    margin-bottom: 0.5rem;
}

.kartu-link-modern {
    display: flex;
    align-items: center;
    justify-content: space-between;
    font-size: 0.75rem;
    font-weight: 500;
    color: #64748b;
    border-top: 1px solid #f1f5f9;
    padding-top: 0.5rem;
}

.kartu-link-modern i {
    font-size: 1rem;
    transition: transform 0.3s ease;
}

.kartu-modern:hover .kartu-link-modern i {
    transform: translateX(4px);
}

.kartu-decoration-modern {
    position: absolute;
    top: 0;
    right: 0;
    width: 140px;
    height: 140px;
    pointer-events: none;
    z-index: 1;
    opacity: 0.7;
    transition: opacity 0.3s ease;
}

.circle-1-modern,
.circle-2-modern {
    position: absolute;
    border-radius: 50%;
    border-width: 3px;
    border-style: solid;
}

.circle-1-modern {
    top: -20px;
    right: -20px;
    width: 90px;
    height: 90px;
}

.circle-2-modern {
    top: 10px;
    right: 10px;
    width: 60px;
    height: 60px;
}

@media (max-width: 768px) {
    .kartu-modern {
        padding: 1rem;
        min-height: 120px;
        border-left-width: 4px;
    }

    .kartu-icon-modern {
        width: 45px;
        height: 45px;
        font-size: 1.25rem;
    }

    .kartu-value-modern {
        font-size: 1.75rem;
    }

    .kartu-decoration-modern {
        width: 120px;
        height: 120px;
    }

    .circle-1-modern {
        width: 75px;
        height: 75px;
        border-width: 2.5px;
    }

    .circle-2-modern {
        width: 50px;
        height: 50px;
        border-width: 2.5px;
    }
}
</style>