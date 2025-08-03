@extends('layout.main')

@section('content')    
    <div class="col-12">
        <div class="card">
            <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Form Tambah Data Paket Wisata</h5>
                <div class="card">
                    <div class="card-body">
                    <form action="{{ route('admin.paketwisata.update', $dataPaketWisata->paket_id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="nama_paket" class="form-label">Nama Paket Wisata</label>
                            <input type="text" class="form-control" name="nama_paket" id="nama_paket" value="{{ $dataPaketWisata->nama_paket }}" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="kuota_minimal" class="form-label">Kuota Minimal</label>
                            <input type="text" class="form-control" name="kuota_minimal" id="kuota_minimal" value="{{ $dataPaketWisata->kuota_minimal }}" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="Text">Deskripsi</label>
                            <input type="text" class="form-control" name="deskripsi" id="deskripsi" value="{{ $dataPaketWisata->deskripsi }}" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" class="form-control" name="harga" id="harga" value="{{ $dataPaketWisata->harga }}" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="hidden" name="include_susu" value="0">
                            <input type="checkbox" class="form-check-input" name="include_susu" id="exampleCheck1" value="1"
                                {{ $dataPaketWisata->include_susu ? 'checked' : '' }}>
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