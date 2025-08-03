@extends('layout.main')

@section('content')
<div class="col-12">
  <div class="card">
    <div class="card-body">
      <div class="d-md-flex align-items-center">
        <div>
          <h4 class="card-title">Data Orderan</h4>
          <p class="card-subtitle">
            Silahkan Kelola Data Order
          </p>
        </div>
        <div class="ms-auto mt-3 mt-md-0">
          <a href="{{ route('admin.order.create') }}" class="btn btn-success w-100 py-8 fs-4 mb-4 rounded-2">+ Tambah</a>
        </div>
      </div>
      <div class="table-responsive mt-4">
          <table class="table mb-0 text-nowrap varient-table align-middle fs-3">
          <thead class="table-success text-center">
            <tr>
              <th scope="col" class="px-0 text-muted">Nama Pengunjung</th>
              <th scope="col" class="px-0 text-muted">Nama Paket Wisata</th>
              <th scope="col" class="px-0 text-muted">Jumlah Pesanan</th>
              <th scope="col" class="px-0 text-muted">Total Harga</th>
              <th scope="col" class="px-0 text-muted">Tanggal Kunjungan</th>
              <th scope="col" class="px-0 text-muted">Tanggal Order</th>
              <th scope="col" class="px-0 text-muted">Status Pembayaran</th>
              <th scope="col" class="px-0 text-muted">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($orders as $dataOrder)
            <tr>
              <td class="px-0">
                <div class="d-flex align-items-center justify-content-center">
                  <div class="ms-3">{{ $dataOrder->pengunjung->nama_lengkap ?? '-' }}</div>
                </div>
              </td>
              <td class="px-0">
                <div class="d-flex align-items-center justify-content-center">
                  <div class="ms-3">{{ $dataOrder->paketwisata->nama_paket ?? '-' }}</div>
                </div>
              </td>
              <td class="px-0">
                <div class="d-flex align-items-center justify-content-center">
                  <div class="ms-3">{{ $dataOrder->jumlah }}</div>
                </div>
              </td>
              <td class="px-0">
                <div class="d-flex align-items-center justify-content-center">
                  <div class="ms-3">{{ $dataOrder->total_harga }}</div>
                </div>
              </td>
              <td class="px-0">
                <div class="d-flex align-items-center justify-content-center">
                  <div class="ms-3">{{ $dataOrder->tgl_kunjungan }}</div>
                </div>
              </td>
              <td class="px-0">
                <div class="d-flex align-items-center justify-content-center">
                  <div class="ms-3">{{ $dataOrder->tgl_order }}</div>
                </div>
              </td>

              <td class="px-0">
                <div class="d-flex align-items-center justify-content-center">
                  @if ($dataOrder->status_pembayaran === 'sudah lunas')
                    <span class="badge bg-success">Sudah Lunas</span>
                  @elseif ($dataOrder->status_pembayaran === 'belum bayar')
                    <span class="badge bg-danger">Belum Bayar</span>
                  @elseif ($dataOrder->status_pembayaran === 'belum lunas')
                    <span class="badge bg-warning">Belum Lunas</span>
                  @else
                    <span class="badge bg-secondary">Status Tidak Diketahui</span>
                  @endif
                </div>
              </td>

              <td class="text-center">
                <div class="d-flex justify-content-center gap-2">
                  <!-- Tombol Edit -->
                  <a href="{{ route('admin.order.update', $dataOrder->order_id) }}" 
                    class="btn btn-secondary">
                    <i class="material-icons">edit</i>
                  </a>
                  <!-- Tombol Hapus -->
                  <form action="{{ route('admin.order.destroy', $dataOrder->order_id) }}" method="POST" onsubmit="return confirm('Yakin akan menghapus data?')">
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