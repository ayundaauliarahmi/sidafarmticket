@extends('layout.main')

@section('content')
<div class="col-12">
  <div class="card">
    <div class="card-body">
      <div class="d-md-flex align-items-center">
        <div>
          <h4 class="card-title">Data Transaksi</h4>
          <p class="card-subtitle">
            Silahkan Kelola Data Transaksi
          </p>
        </div>
        <div class="ms-auto mt-3 mt-md-0">
          <a href="{{ route('admin.transaction.create') }}" class="btn btn-success w-100 py-8 fs-4 mb-4 rounded-2">+ Tambah</a>
        </div>
      </div>
      <div class="table-responsive mt-4">
          <table class="table mb-0 text-nowrap varient-table align-middle fs-3">
          <thead class="table-success text-center">
            <tr>
              <th scope="col" class="px-0 text-muted">Nama Pemesan Tiket</th>
              <th scope="col" class="px-0 text-muted">Jumlah Tagihan</th>
              <th scope="col" class="px-0 text-muted">Jumlah Bayar</th>
              <th scope="col" class="px-0 text-muted">Metode Pembayaran</th>
              <th scope="col" class="px-0 text-muted">Tanggal Pembayaran</th>
              <th scope="col" class="px-0 text-muted">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($transactions as $dataTransaction)
            <tr>
              <td class="px-0">
                <div class="d-flex align-items-center justify-content-center">
                  <div class="ms-3">{{ $dataTransaction->orders->pengunjung->user->nama ?? '-' }}</div>
                </div>
              </td>
              <td class="px-0">
                <div class="d-flex align-items-center justify-content-center">
                  <div class="ms-3">{{ $dataTransaction->orders->total_harga ?? '-' }}</div>
                </div>
              </td>
              <td class="px-0">
                <div class="d-flex align-items-center justify-content-center">
                  <div class="ms-3">{{ $dataTransaction->jumlah_bayar }}</div>
                </div>
              </td>
              <td class="px-0">
                <div class="d-flex align-items-center justify-content-center">
                  <div class="ms-3">{{ $dataTransaction->metode_pembayaran }}</div>
                </div>
              </td>
              <td class="px-0">
                <div class="d-flex align-items-center justify-content-center">
                  <div class="ms-3">{{ $dataTransaction->tgl_bayar }}</div>
                </div>
              </td>

              <td class="text-center">
                <div class="d-flex justify-content-center gap-2">
                  <!-- Tombol Edit -->
                  <a href="{{ route('admin.transaction.update', $dataTransaction->trx_id) }}" 
                    class="btn btn-secondary">
                    <i class="material-icons">edit</i>
                  </a>
                  <!-- Tombol Hapus -->
                  <form action="{{ route('admin.transaction.destroy', $dataTransaction->trx_id) }}" method="POST" onsubmit="return confirm('Yakin akan menghapus data?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                      <i class="material-icons">delete</i>
                    </button>
                  </form>
                </div>
              </td>
            </tr>
            @endforeach 
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection