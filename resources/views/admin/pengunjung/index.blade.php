@extends('layout.main')

@section('content')
<div class="col-12">
  <div class="card">
    <div class="card-body">
      <div class="d-md-flex align-items-center">
        <div>
          <h4 class="card-title">Data Pengunjung</h4>
          <p class="card-subtitle">
            Silahkan Kelola Pengunjung
          </p>
        </div>
        <div class="ms-auto mt-3 mt-md-0">
          <a href="{{ route('admin.pengunjung.create') }}" class="btn btn-success w-100 py-8 fs-4 mb-4 rounded-2">+ Tambah</a>
        </div>
      </div>
      <div class="table-responsive mt-4">
             <table class="table mb-0 text-nowrap varient-table align-middle fs-3">
          <thead class="table-success text-center">
            <tr>
              <th scope="col" class="px-0 text-muted">Nama Pengunjung</th>
              <th scope="col" class="px-0 text-muted">Email</th>
              <th scope="col" class="px-0 text-muted">No Telepon</th>
              <th scope="col" class="px-0 text-muted">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($pengunjungs as $dataPengunjung)
            <tr>
              <td class="px-0">
                <div class="d-flex align-items-center justify-content-center">
                  <div class="ms-3">{{ $dataPengunjung->nama_lengkap }}</div>
                </div>
              </td>
              <td class="px-0">
                <div class="d-flex align-items-center justify-content-center">
                  <div class="ms-3">{{ $dataPengunjung->email }}</div>
                </div>
              </td>
              <td class="px-0">
                <div class="d-flex align-items-center justify-content-center">
                  <div class="ms-3">{{ $dataPengunjung->no_hp }}</div>
                </div>
              </td>
              <td class="text-center">
                <div class="d-flex justify-content-center gap-2">
                  <!-- Tombol Edit -->
                  <a href="{{ route('admin.pengunjung.update', $dataPengunjung->pengunjung_id) }}" 
                    class="btn btn-secondary">
                    <i class="material-icons">edit</i>
                  </a>
                  <!-- Tombol Hapus -->
                  <form action="{{ route('admin.pengunjung.destroy', $dataPengunjung->pengunjung_id) }}" method="POST" onsubmit="return confirm('Yakin akan menghapus data?')">
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