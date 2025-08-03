{{-- @extends('layout.main')

@section('content')    
    <div class="col-12">
        <div class="card">
            <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Form Tambah Data Order</h5>
                <div class="card">
                    <div class="card-body">
                    <form action="{{ route('admin.order.update', $dataOrder->order_id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="pengunjung_id" class="form-label">Nama Pengunjung</label>
                            <select class="form-control" name="pengunjung_id" id="pengunjung_id" required>
                                <option value="">-- Pilih Pengunjung --</option>
                                @foreach($pengunjung as $pengunjungs)
                                    <option value="{{ $pengunjungs->pengunjung_id }}" {{ $dataOrder->pengunjung_id == $pengunjungs->pengunjung_id ? 'selected' : '' }}>
                                        {{ $pengunjungs->nama_lengkap }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="paket_id" class="form-label">Nama Paket Wisata</label>
                            <select class="form-control" name="paket_id" id="paket_id" required>
                                <option value="">-- Pilih Paket Wisata --</option>
                                @foreach($paketwisata as $paket)
                                    <option value="{{ $paket->paket_id }}" {{ $dataOrder->paket_id == $paket->paket_id ? 'selected' : '' }}>
                                        {{ $paket->nama_paket }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="jumlah" class="form-label">Jumlah Pesanan</label>
                            <input type="number" class="form-control" name="jumlah" id="jumlah" value="{{ $dataOrder->jumlah }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="tgl_kunjungan" class="form-label">Tanggal Kunjungan</label>
                            <input type="date" class="form-control" name="tgl_kunjungan" id="tgl_kunjungan"
                            value="{{ date('Y-m-d', strtotime($dataOrder->tgl_kunjungan)) }}" required>
                        </div>

                          <div class="mb-3">
                            <label for="status_pembayaran" class="form-label">Status Pembayaran</label>
                            <select class="form-control" name="status_pembayaran" id="status_pembayaran" required>
                                <option value="">-- Update Status Pembayaran --</option>
                                <option value="sudah bayar" {{ $dataOrder->status_pembayaran == 'sudah bayar' ? 'selected' : '' }}>Sudah Bayar</option>
                                <option value="belum bayar" {{ $dataOrder->status_pembayaran == 'belum bayar' ? 'selected' : '' }}>Belum Bayar</option>
                                <option value="pembayaran gagal" {{ $dataOrder->status_pembayaran == 'pembayaran gagal' ? 'selected' : '' }}>Pembayaran Gagal</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}