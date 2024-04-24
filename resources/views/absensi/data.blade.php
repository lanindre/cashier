<table class="table table-compact table-stripped" id="myTable">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Karyawan</th>
            <th>Tanggal Masuk</th>
            <th>Waktu Masuk</th>
            <th>Status</th>
            <th>Waktu Keluar</th>
            {{-- <th>Nama Kategori</th> --}}
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($absensi as $p)
            <tr>
                <td>{{ $i = !isset($i) ? ($i = 1) : ++$i }}</td>
                <td>{{ $p->namaKaryawan }}</td>
                <td>{{ $p->tanggalMasuk }}</td>
                <td>{{ $p->waktuMasuk }}</td>
                <td>
                    <select name="status" class="status" data-id="{{ $p->id }}">
                        <option value="masuk" {{ $p->status === 'masuk' ? 'selected' : '' }}>Masuk</option>
                        <option value="izin" {{ $p->status === 'izin' ? 'selected' : '' }}>Izin</option>
                        <option value="cuti" {{ $p->status === 'cuti' ? 'selected' : '' }}>Cuti</option>
                    </select>
                </td>
                <td>
                    @if ($p->namaKaryawan && $p->tanggalMasuk && $p->waktuMasuk && $p->status)
                        <button type="button" class="btn btn-primary" id="btnSelesai_{{ $p->id }}" onclick="tampilkanWaktu('{{ $p->id }}')">Selesai</button>
                    @else
                        <!-- Tampilkan pesan kosong jika input lain belum terisi -->
                        -
                    @endif
                </td>
                
                <script>
                    function tampilkanWaktu(id) {
                        // Dapatkan elemen tombol yang diklik
                        var tombol = document.getElementById("btnSelesai_" + id);
                        
                        // Buat objek Date untuk mendapatkan waktu sekarang
                        var waktuSekarang = new Date();
                
                        // Dapatkan komponen waktu (jam, menit, detik)
                        var jam = waktuSekarang.getHours();
                        var menit = waktuSekarang.getMinutes();
                        var detik = waktuSekarang.getSeconds();
                
                        // Format waktu menjadi string yang sesuai
                        var waktuString = jam + ":" + menit + ":" + detik;
                
                        // Tambahkan waktu ke dalam tombol
                        tombol.innerText = waktuString;
                    }
                </script>
                {{-- <td>{{ $p->waktuKeluar }}</td> --}}
                {{-- <td>{{ $p->kategori_id }}</td> --}}
                <td>
                    <button type="button" class="btn btn-primary btn-edit" data-toggle="modal"
                        data-target="#modalEdit"data-mode="edit" data-id="{{ $p->id }}"
                        data-json="{{ json_encode($p) }}" data-nama_karyawan="{{ $p->namaKaryawan }}"  data-tanggal_masuk="{{$p->tanggalMasuk}}" data-waktu_masuk="{{$p->waktuMasuk}}" data-status="{{$p->status}}" data-waktu_keluar="{{$p->waktuKeluar}}">
                        <i class="fas fa-edit"></i>
                    </button>
                    <form action="{{ route('absensi.destroy', $p->id) }}" method="post" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></button>
                </td>
                </form>
            </tr>
        @endforeach
    </tbody>
</table>

