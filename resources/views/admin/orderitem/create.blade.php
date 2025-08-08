@extends('layout.main')

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Form Tambah Data Order Item</h5>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.orderitem.store') }}" method="POST">
                @csrf

                {{-- Tampilkan nama pengunjung dan simpan order_id tersembunyi --}}
                <div class="mb-3">
                    <label class="form-label">Nama Pengunjung</label>
                    <input type="text" class="form-control" value="{{ $order->pengunjung->user->nama }}" disabled>
                    <input type="hidden" name="order_id" value="{{ $order->order_id }}">
                </div>

                <h6 class="fw-semibold">Pilih Paket Wisata (Minimal 3)</h6>

                @for ($i = 0; $i < 3; $i++)
                    <div class="mb-3 border p-3 rounded">
                        <div class="row">
                            <div class="col-md-8">
                                <label class="form-label">Paket Wisata ke-{{ $i + 1 }}</label>
                                <select class="form-control" name="paket_id[]">
                                    <option value="">-- Pilih Paket --</option>
                                    @foreach($paketwisata as $paket)
                                        <option value="{{ $paket->paket_id }}">
                                            {{ $paket->nama_paket }} (Rp{{ number_format($paket->harga, 0, ',', '.') }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Jumlah</label>
                                <input type="number" name="jumlah[]" class="form-control">
                            </div>
                        </div>
                    </div>
                @endfor
                 
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('admin.order.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
