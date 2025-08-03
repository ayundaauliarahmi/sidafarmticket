@extends('layout.main')

@section('content')    
    <div class="col-12">
        <div class="card">
            <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Form Tambah Data Paket Wisata</h5>
                <div class="card">
                    <div class="card-body">
                    <form action="{{ route('admin.paketwisata.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_paket" class="form-label">Nama Paket Wisata</label>
                            <input type="text" class="form-control" name="nama_paket" id="nama_paket" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="kuota_minimal" class="form-label">Kuota Minimal</label>
                            <input type="text" class="form-control" name="kuota_minimal" id="kuota_minimal" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control" name="deskripsi" id="deskripsi" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" class="form-control" name="harga" id="harga" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" name="include_susu" id="exampleCheck1" value="1">
                            <label class="form-check-label" for="exampleCheck1">Include Susu</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection