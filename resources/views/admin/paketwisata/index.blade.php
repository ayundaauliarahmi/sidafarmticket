@extends('layout.main')

@section('content')
<div class="col-12">
  <div class="card">
    <div class="card-body">
      <div class="d-md-flex align-items-center">
        <div>
          <h4 class="card-title">Data Paket Wisata</h4>
          <p class="card-subtitle">
            Silahkan Kelola Paket Wisata
          </p>
        </div>
        <div class="ms-auto mt-3 mt-md-0">
          <a href="{{ route('admin.paketwisata.create') }}" class="btn btn-success w-100 py-8 fs-4 mb-4 rounded-2">+ Tambah</a>
        </div>
      </div>
      <div class="table-responsive mt-4">
          <table class="table mb-0 text-nowrap varient-table align-middle fs-3">
          <thead class="table-success text-center">
            <tr>
              <th scope="col" class="px-0 text-muted">Nama Paket Wisata</th>
              <th scope="col" class="px-0 text-muted">Kuota Minimal</th>
              <th scope="col" class="px-0 text-muted">Deskripsi</th>
              <th scope="col" class="px-0 text-muted">Harga</th>
              <th scope="col" class="px-0 text-muted">Include Susu</th>
              <th scope="col" class="px-0 text-muted">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($paketwisatas as $dataPaketWisata)
            <tr>
              <td class="px-0">
                <div class="d-flex align-items-center justify-content-center">
                  <div class="ms-3">{{ $dataPaketWisata->nama_paket }}</div>
                </div>
              </td>
              <td class="px-0">
                <div class="d-flex align-items-center justify-content-center">
                  <div class="ms-3">{{ $dataPaketWisata->kuota_minimal }}</div>
                </div>
              </td>
             <td class="px-0">
                <div class="d-flex align-items-center">
                  <div class="ms-3 text-wrap" style="white-space: normal; word-break: break-word;">
                    {{ $dataPaketWisata->deskripsi }}
                  </div>
                </div>
              </td>
              <td class="px-0">
                <div class="d-flex align-items-center justify-content-center">
                  <div class="ms-3">{{ $dataPaketWisata->harga }}</div>
                </div>
              </td>
              <td class="px-0">
                <div class="d-flex align-items-center justify-content-center">
                  <div class="ms-3">{{ $dataPaketWisata->include_susu }}</div>
                </div>
              </td>
              <td class="text-center">
                <div class="d-flex justify-content-center gap-2">
                  <!-- Tombol Edit -->
                  <a href="{{ route('admin.paketwisata.update', $dataPaketWisata->paket_id) }}" 
                    class="btn btn-secondary">
                    <i class="material-icons">edit</i>
                  </a>
                  <!-- Tombol Hapus -->
                  <form action="{{ route('admin.paketwisata.destroy', $dataPaketWisata->paket_id) }}" method="POST" onsubmit="return confirm('Yakin akan menghapus data?')">
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