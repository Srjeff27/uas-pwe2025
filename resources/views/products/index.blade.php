@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <h2 class="fw-bold mb-2">Katalog Smartphone</h2>
            <p class="text-muted mb-0">Kelola inventaris smartphone Anda</p>
        </div>
        <a href="{{ route('products.create') }}" class="btn btn-primary rounded-pill px-4">
            <i class="fas fa-plus me-2"></i>Tambah Produk
        </a>
    </div>
    <div class="row g-4">
        @forelse($products as $product)
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden hover-shadow transition-all">
                <div class="position-relative">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" 
                             class="card-img-top" 
                             alt="{{ $product->name }}" 
                             style="height: 280px; object-fit: cover;">
                    @else
                        <div class="bg-light d-flex align-items-center justify-content-center" style="height: 280px;">
                            <i class="fas fa-mobile-alt fa-3x text-muted"></i>
                        </div>
                    @endif
                    <div class="position-absolute top-0 start-0 m-3">
                        <span class="badge bg-{{ $product->stock > 0 ? 'success' : 'danger' }} rounded-pill px-3 py-2 shadow-sm">
                            {{ $product->stock > 0 ? $product->stock . ' unit' : 'Stok Habis' }}
                        </span>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <h5 class="card-title fw-bold mb-0">{{ $product->name }}</h5>
                        <span class="badge bg-light text-dark rounded-pill">{{ $product->category }}</span>
                    </div>
                    <p class="text-muted small mb-3">{{ $product->description }}</p>
                    <h4 class="text-primary fw-bold mb-0">Rp {{ number_format($product->price, 0, ',', '.') }}</h4>
                </div>
                <div class="card-footer bg-white border-0 p-4 pt-0">
                    <div class="d-flex gap-2">
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-light flex-grow-1 rounded-3">
                            <i class="fas fa-edit me-2"></i>Edit
                        </a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="flex-grow-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-100 rounded-3" 
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                                <i class="fas fa-trash-alt me-2"></i>Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info rounded-4 shadow-sm border-0">
                <div class="text-center p-4">
                    <i class="fas fa-mobile-alt fa-3x mb-3 text-info"></i>
                    <h5 class="fw-bold">Belum Ada Produk</h5>
                    <p class="mb-3">Mulai dengan menambahkan smartphone pertama ke inventaris</p>
                    <a href="{{ route('products.create') }}" class="btn btn-info text-white rounded-pill px-4">
                        Tambah Produk Pertama
                    </a>
                </div>
            </div>
        </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-5">
        {{ $products->links() }}
    </div>
</div>

<style>
.hover-shadow {
    transition: all 0.3s ease;
}
.hover-shadow:hover {
    transform: translateY(-5px);
    box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;
}
.transition-all {
    transition: all 0.3s ease;
}
</style>
@endsection 