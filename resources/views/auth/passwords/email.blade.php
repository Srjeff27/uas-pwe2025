@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="text-center mb-4">
                <i class="fas fa-key fa-3x text-primary mb-3"></i>
                <h2 class="fw-bold">Reset Kata Sandi</h2>
                <p class="text-muted">Masukkan email Anda untuk menerima instruksi reset kata sandi</p>
            </div>

            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show rounded-3 mb-4" role="alert">
                            {{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="email" class="form-label fw-500">Email</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-envelope text-muted"></i>
                                </span>
                                <input id="email" type="email" class="form-control border-start-0 ps-0 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Masukkan email Anda">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 mb-3">
                            <i class="fas fa-paper-plane me-2"></i>Kirim Link Reset
                        </button>

                        <p class="text-center mb-0">
                            Ingat kata sandi Anda? 
                            <a href="{{ route('login') }}" class="text-primary text-decoration-none">Kembali ke login</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.input-group-text {
    border-radius: 0.75rem 0 0 0.75rem;
}
.input-group .form-control {
    border-radius: 0 0.75rem 0.75rem 0;
}
.form-control:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 0.25rem rgba(102,126,234,.25);
}
.fw-500 {
    font-weight: 500;
}
.alert {
    border: none;
}
.alert-success {
    background-color: #e6f4ea;
    color: #1e7e34;
}
</style>
@endsection
