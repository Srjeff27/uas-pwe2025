@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex align-items-center mb-4">
                <a href="{{ route('products.index') }}" class="btn btn-light rounded-circle me-3">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <div>
                    <h2 class="fw-bold mb-1">Edit Produk</h2>
                    <p class="text-muted mb-0">Perbarui informasi produk smartphone</p>
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama Produk</label>
                                    <input type="text" class="form-control rounded-3 @error('name') is-invalid @enderror" 
                                           id="name" name="name" value="{{ old('name', $product->name) }}"
                                           placeholder="Masukkan nama smartphone">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="category" class="form-label">Merek</label>
                                    <select class="form-select rounded-3 @error('category') is-invalid @enderror" 
                                            id="category" name="category">
                                        <option value="" selected disabled>Pilih merek</option>
                                        <option value="Apple" {{ old('category', $product->category) == 'Apple' ? 'selected' : '' }}>Apple</option>
                                        <option value="Samsung" {{ old('category', $product->category) == 'Samsung' ? 'selected' : '' }}>Samsung</option>
                                        <option value="Xiaomi" {{ old('category', $product->category) == 'Xiaomi' ? 'selected' : '' }}>Xiaomi</option>
                                        <option value="Oppo" {{ old('category', $product->category) == 'Oppo' ? 'selected' : '' }}>Oppo</option>
                                        <option value="Vivo" {{ old('category', $product->category) == 'Vivo' ? 'selected' : '' }}>Vivo</option>
                                        <option value="Realme" {{ old('category', $product->category) == 'Realme' ? 'selected' : '' }}>Realme</option>
                                        <option value="Other" {{ old('category', $product->category) == 'Other' ? 'selected' : '' }}>Lainnya</option>
                                    </select>
                                    @error('category')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="stock" class="form-label">Stok</label>
                                    <input type="number" class="form-control rounded-3 @error('stock') is-invalid @enderror" 
                                           id="stock" name="stock" value="{{ old('stock', $product->stock) }}"
                                           placeholder="Masukkan jumlah stok">
                                    @error('stock')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="price" class="form-label">Harga (Rp)</label>
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text rounded-start-3">Rp</span>
                                        <input type="number" class="form-control @error('price') is-invalid @enderror" 
                                               id="price" name="price" value="{{ old('price', $product->price) }}"
                                               placeholder="Contoh: 12000000">
                                    </div>
                                    @error('price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="description" class="form-label">Spesifikasi</label>
                                    <textarea class="form-control rounded-3 @error('description') is-invalid @enderror" 
                                              id="description" name="description" rows="4"
                                              placeholder="Masukkan spesifikasi smartphone (RAM, Penyimpanan, Kamera, dll.)">{{ old('description', $product->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label for="image" class="form-label">Foto Produk</label>
                                    @if($product->image)
                                        <div class="mb-3">
                                            <img src="{{ asset('storage/' . $product->image) }}" 
                                                 alt="{{ $product->name }}" 
                                                 class="img-thumbnail rounded-3"
                                                 style="max-height: 200px">
                                        </div>
                                    @endif
                                    <input type="file" class="form-control rounded-3 @error('image') is-invalid @enderror" 
                                           id="image" name="image">
                                    <div class="form-text">Format yang didukung: JPG, PNG, GIF (Maks. 2MB)</div>
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('products.index') }}" class="btn btn-light rounded-3">
                                <i class="fas fa-times me-2"></i>Batal
                            </a>
                            <button type="submit" class="btn btn-primary rounded-3">
                                <i class="fas fa-save me-2"></i>Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.form-control:focus,
.form-select:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 0.25rem rgba(102,126,234,.25);
}
.input-group-text {
    background-color: #f8f9fa;
    border-color: #dee2e6;
}
</style>
@endsection 