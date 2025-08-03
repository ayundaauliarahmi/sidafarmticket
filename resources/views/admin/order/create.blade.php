@extends('layout.main')

@section('content')    
    <div class="col-12">
        <div class="card">
            <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Form Tambah Data Order</h5>
                <div class="card">
                    <div class="card-body">
                    <form action="{{ route('admin.order.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="pengunjung_id" class="form-label">Nama Pengunjung</label>
                            <select class="form-control" name="pengunjung_id" id="pengunjung_id" required>
                                <option value="">-- Pilih Pengunjung --</option>
                                @foreach($pengunjung as $pengunjungs)
                                    <option value="{{ $pengunjungs->pengunjung_id }}">{{ $pengunjungs->nama_lengkap }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="paket_id" class="form-label">Nama Paket Wisata</label>
                            <select class="form-control" name="paket_id" id="paket_id" required>
                                <option value="">-- Pilih Paket Wisata --</option>
                                @foreach($paketwisata as $paket)
                                    <option value="{{ $paket->paket_id }}">{{ $paket->nama_paket }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="jumlah" class="form-label">Jumlah Pesanan</label>
                            <input type="integer" class="form-control" name="jumlah" id="jumlah" aria-describedby="emailHelp">
                        </div>

                        <div class="mb-3">
                            <label for="tgl_kunjungan" class="form-label">Tanggal Kunjungan</label>
                            <input type="date" class="form-control" name="tgl_kunjungan" id="tgl_kunjungan" aria-describedby="emailHelp">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection