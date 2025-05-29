@extends('layouts.app')

@section('content')
<div class="container py-4">
    <!-- Stats Cards -->
    <div class="row g-4 mb-5">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 h-100 bg-primary bg-opacity-10">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="flex-shrink-0">
                            <div class="bg-primary bg-opacity-10 p-3 rounded-3">
                                <i class="fas fa-mobile-alt fa-2x text-primary"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="text-muted mb-1">Total Produk</h6>
                            <h4 class="mb-0">{{ $totalProducts }}</h4>
                        </div>
                    </div>
                    <span class="text-muted">Model smartphone tersedia</span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 h-100 bg-success bg-opacity-10">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="flex-shrink-0">
                            <div class="bg-success bg-opacity-10 p-3 rounded-3">
                                <i class="fas fa-dollar-sign fa-2x text-success"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="text-muted mb-1">Nilai Stok</h6>
                            <h4 class="mb-0">Rp {{ number_format($totalStockValue, 0, ',', '.') }}</h4>
                        </div>
                    </div>
                    <span class="text-muted">Total nilai inventaris</span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 h-100 bg-info bg-opacity-10">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="flex-shrink-0">
                            <div class="bg-info bg-opacity-10 p-3 rounded-3">
                                <i class="fas fa-box fa-2x text-info"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="text-muted mb-1">Total Stok</h6>
                            <h4 class="mb-0">{{ $totalStock }}</h4>
                        </div>
                    </div>
                    <span class="text-muted">Unit dalam inventaris</span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 h-100 bg-warning bg-opacity-10">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="flex-shrink-0">
                            <div class="bg-warning bg-opacity-10 p-3 rounded-3">
                                <i class="fas fa-exclamation-triangle fa-2x text-warning"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="text-muted mb-1">Low Stock</h6>
                            <h4 class="mb-0">{{ $lowStockProducts->count() }}</h4>
                        </div>
                    </div>
                    <span class="text-muted">Items with stock < 10</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Brand Distribution -->
    <div class="row g-4 mb-5">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body">
                    <h5 class="card-title fw-bold mb-4">Distribusi Merek</h5>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Merek</th>
                                    <th>Model</th>
                                    <th>Total Stok</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $brands = $products->groupBy('category');
                                @endphp
                                @foreach($brands as $brand => $items)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="brand-icon me-2">
                                                @switch(strtolower($brand))
                                                    @case('apple')
                                                        <i class="fab fa-apple text-dark"></i>
                                                        @break
                                                    @case('samsung')
                                                        <span class="fw-bold text-primary">S</span>
                                                        @break
                                                    @case('xiaomi')
                                                        <span class="fw-bold text-orange">MI</span>
                                                        @break
                                                    @default
                                                        <i class="fas fa-mobile-alt text-secondary"></i>
                                                @endswitch
                                            </div>
                                            {{ $brand }}
                                        </div>
                                    </td>
                                    <td>{{ $items->count() }}</td>
                                    <td>{{ $items->sum('stock') }}</td>
                                    <td>Rp {{ number_format($items->sum(function($item) { return $item->stock * $item->price; }), 0, ',', '.') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body">
                    <h5 class="card-title fw-bold mb-4">Peringatan Stok Menipis</h5>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Produk</th>
                                    <th>Merek</th>
                                    <th>Stok</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($lowStockProducts as $product)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            @if($product->image)
                                                <img src="{{ asset('storage/' . $product->image) }}" 
                                                     alt="{{ $product->name }}" 
                                                     class="rounded-3" 
                                                     width="40" 
                                                     height="40" 
                                                     style="object-fit: cover;">
                                            @else
                                                <div class="bg-light rounded-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                                    <i class="fas fa-mobile-alt text-muted"></i>
                                                </div>
                                            @endif
                                            <div class="ms-3">
                                                <h6 class="mb-0">{{ $product->name }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-light text-dark rounded-pill px-3">{{ $product->category }}</span></td>
                                    <td><span class="text-danger fw-bold">{{ $product->stock }}</span></td>
                                    <td>
                                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-light rounded-pill px-3">
                                            Perbarui Stok
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Latest Products -->
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body">
            <h5 class="card-title fw-bold mb-4">Produk Terbaru</h5>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Produk</th>
                            <th>Merek</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Ditambahkan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($latestProducts as $product)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    @if($product->image)
                                        <img src="{{ asset('storage/' . $product->image) }}" 
                                             alt="{{ $product->name }}" 
                                             class="rounded-3" 
                                             width="40" 
                                             height="40" 
                                             style="object-fit: cover;">
                                    @else
                                        <div class="bg-light rounded-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                            <i class="fas fa-mobile-alt text-muted"></i>
                                        </div>
                                    @endif
                                    <div class="ms-3">
                                        <h6 class="mb-0">{{ $product->name }}</h6>
                                        <small class="text-muted">{{ Str::limit($product->description, 50) }}</small>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge bg-light text-dark rounded-pill px-3">{{ $product->category }}</span></td>
                            <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                            <td>
                                <span class="badge {{ $product->stock > 10 ? 'bg-success' : 'bg-danger' }} rounded-pill px-3">
                                    {{ $product->stock }}
                                </span>
                            </td>
                            <td>{{ $product->created_at->diffForHumans() }}</td>
                            <td>
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-light rounded-pill px-3">
                                    <i class="fas fa-edit me-1"></i> Edit
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
.card {
    transition: all 0.3s ease;
}
.card:hover {
    transform: translateY(-5px);
}
.brand-icon {
    width: 24px;
    height: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.text-orange {
    color: #ff6900;
}
.table > :not(caption) > * > * {
    padding: 1rem;
}
.badge {
    font-weight: 500;
}
</style>
@endsection 