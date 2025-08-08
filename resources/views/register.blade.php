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
          <label>Create An Account</label>
        </div>

        <form action="{{ route('register') }}" method="POST">
          @csrf
          <!-- Menampilkan pesan error jika ada -->
          @if ($errors->any())
              <div class="mb-4">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li class="text-red-500 text-xs">{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif

          <div class="mb-3">
            <label for="nama" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Ex : Ayunda Aulia Rahmi">
          </div>

          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Ex : ayundaauliaa@gmail.com">
          </div>

          <div class="mb-3">
            <label for="no_hp" class="form-label">No.Telepon</label>
            <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Ex : 081237384425">
          </div>

          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Ex : *******">
          </div>

          <div class="mb-3">
            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Ex : *******">
          </div>

          {{-- Input hidden untuk level --}}
          <div class="mb-3">
            <label for="level" class="form-label">Level</label>
            <input type="text" class="form-control"name="level" id="level" value="pengunjung" readonly>
          </div>
       
          <button type="submit" class="btn btn-success w-100 mb-3">Sign Up</button>

          <div class="text-center">
            <span class="me-1">Already have an account?</span>
            <a href="login" class="text-success fw-bold">Login</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
