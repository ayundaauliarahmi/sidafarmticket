@extends('layout.main')

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h5 class="card-title fw-semibold mb-4">Form Tambah Data Order</h5>

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <form action="{{ route('admin.order.store') }}" method="POST">
                @csrf

                {{-- Pilih Pengunjung --}}
                <div class="mb-3">
                    <label for="pengunjung_id" class="form-label">Nama Pengunjung</label>
                    <select class="form-control" name="pengunjung_id" required>
                        <option value="">-- Pilih Pengunjung --</option>
                        @foreach($pengunjung as $p)
                            <option value="{{ $p->pengunjung_id }}">{{ $p->user->nama }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Tanggal Kunjungan --}}
                <div class="mb-3">
                    <label for="tgl_kunjungan" class="form-label">Tanggal Kunjungan</label>
                    <input type="date" class="form-control" name="tgl_kunjungan" required>
                </div>

                <button type="submit" class="btn btn-primary">Lanjut Pilih Paket Wisata</button>
            </form>

        </div>
    </div>
</div>
@endsection
