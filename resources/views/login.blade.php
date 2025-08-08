@extends('layout.homepage')

@section('content')
<div class="min-vh-100 d-flex align-items-center justify-content-center bg-light">
  <div class="container">
    <div class="row shadow rounded overflow-hidden" style="background: white;">
      
      <!-- Kolom Kiri - Gambar -->
      <div class="col-md-6 d-none d-md-flex align-items-center justify-content-center p-4" style="background-color: white;">
        <img src="{{ asset('assets/images/login.png') }}" alt="Illustration" class="img-fluid" style="max-width: 90%;">
      </div>

      <!-- Kolom Kanan - Form Login -->
      <div class="col-md-6 p-5">
        <div class="text-start mb-2 text-center">
          <img src="{{ asset('assets/images/logos/logo.png') }}" alt="Logo" width="200">
        </div>
        <div class="text-center">
          <label>Login Your Account</label>
        </div>

        <form action="{{ url('/pengunjung/index') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="email" class="form-label">Username</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="admin@gmail.com">
          </div>

          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="*******">
          </div>

          <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="remember">
              <label class="form-check-label" for="remember">Remember this Device</label>
            </div>
            <a href="#" class="text-decoration-none text-success fw-bold">Forgot Password?</a>
          </div>

          <button type="submit" class="btn btn-success w-100 mb-3">Sign In</button>

          <div class="text-center">
            <span class="me-1">Dont have an account?</span>
            <a href="{{ route('register.index') }}" class="text-success fw-bold">Create/Register</a>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
@endsection
