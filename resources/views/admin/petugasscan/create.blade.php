@extends('layout.main')

@section('content')    
    <div class="col-12">
        <div class="card">
            <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Form Tambah Data Petugas Scan</h5>
                <div class="card">
                    <div class="card-body">
                    <form action="{{ route('admin.petugasscan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Petugas</label>
                            <input type="text" class="form-control" name="nama" id="nama" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" id="username" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="no_hp" class="form-label">No.Telepon</label>
                            <input type="text" class="form-control" name="no_hp" id="no_hp" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password" aria-describedby="emailHelp">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection