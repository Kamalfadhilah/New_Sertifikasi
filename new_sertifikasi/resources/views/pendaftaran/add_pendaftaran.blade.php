@extends('dashboard.main')

@section('content')

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<div class="row">
    <div class="col card">
        <!-- tabel pendaftaran -->
        <div class="tabel-pendaftaran">
            <div class="container">
                <div class="heading-tabel">
                    <div class="heading-tabel-keberangkatan">
                        <h1 class="border-bottom border-dark mb-5">Daftar Menjadi Mahasiswa</h1>
                    </div>
                    <!-- form -->
                    <form action="{{url('pendaftaran/add_pendaftaran')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('post')

                        <fieldset enabled>
                            <div class="mb-3">
                                <label for="foto" class="form-label">Foto Profile</label>
                                <input type="file" name="foto" class="form-control" id="foto" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap" required>
                            </div>
                            <div class="mb-3">
                                <label for="nik" class="form-label">NIK</label>
                                <input type="text" name="nik" class="form-control" id="nik" minlength="16" maxlength="16" required>
                            </div>
                            <div class="mb-3">
                                <label for="alamat_ktp" class="form-label">Alamat KTP</label>
                                <input type="text" name="alamat_ktp" class="form-control" id="alamat_ktp" required>
                            </div>
                            <div class="mb-3">
                                <label for="alamat_lengkap" class="form-label">Alamat Lengkap Saat Ini</label>
                                <input type="text" name="alamat_lengkap" class="form-control" id="alamat_lengkap" required>
                            </div>
                            <div class="mb-3">
                                <label for="disabledSelect" class="form-label">Provinsi</label>
                                <select id="provinsi_alamat" class="form-select" name='provinsi_alamat' required>
                                    <option value="">-- Pilih Provinsi --</option>
                                    @foreach ($provinsi as $item)
                                    <option value="{{ $item->provinsi_id }}">{{ $item->nama_provinsi }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="disabledSelect" class="form-label">Alamat Kabupaten/Kota</label>
                                <select id="kota_alamat" class="form-select" name='kota_alamat_id' required>
                                    <option value="">-- Pilih Alamat Kota --</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="kecamatan" class="form-label">Kecamatan</label>
                                <input type="text" name="kecamatan" class="form-control" id="kecamatan" required>
                            </div>
                            <div class="mb-3">
                                <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                                <input type="tel" name="nomor_telepon" class="form-control" id="nomor_telepon" required>
                            </div>
                            <div class="mb-3">
                                <label for="nomor_hp" class="form-label">Nomor HP</label>
                                <input type="tel" name="nomor_hp" class="form-control" id="nomor_hp" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="email" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kewarganegaraan</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="kewarganegaraan" id="wni_asli"
                                        value="wni_asli" checked>
                                    <label class="form-check-label" for="wni_asli">WNI</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="kewarganegaraan"
                                        id="wni_keturunan" value="wni_keturunan">
                                    <label class="form-check-label" for="wni_keturunan">WNI Keturunan</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="kewarganegaraan" id="wna"
                                        value="wna">
                                    <label class="form-check-label" for="wna">WNA</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="negara_asal" class="form-label">Negara Asal</label>
                                <input type="text" name="negara_asal" class="form-control" id="negara_asal">
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" id="tanggal_lahir" name="tanggal_lahir" required>
                            </div>
                            <div class="mb-3">
                                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" required>
                            </div>
                            <div class="mb-3">
                                <label for="disabledSelect" class="form-label">Kabupaten/Kota Lahir</label>
                                <select id="disabledSelect" class="form-select" name='kota_lahir_id'>
                                    <option value="">-- Pilih Kota Lahir --</option>
                                    @foreach ($kota as $item)
                                    <option value="{{ $item->kota_id }}">{{ $item->nama_kota}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="negara_lahir" class="form-label">Negara Lahir</label>
                                <input type="text" name="negara_lahir" class="form-control" id="negara_lahir">
                            </div>
                            <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <label><input type="radio" name="jenis_kelamin" value="laki-laki" checked/> Laki-laki</label>
                                <label><input type="radio" name="jenis_kelamin" value="perempuan" /> Perempuan</label>
                            </div>
                            <div class="mb-3">
                                <label for="status_menikah" class="form-label">Status Menikah</label>
                                <label><input type="radio" name="status_menikah" value="belum_menikah" checked /> Belum
                                    Menikah</label>
                                <label><input type="radio" name="status_menikah" value="menikah" /> Menikah</label>
                                <label><input type="radio" name="status_menikah" value="lain_lain" /> Lain-Lain</label>
                            </div>
                            <div class="mb-3">
                                <label for="disabledSelect" class="form-label">Agama</label>
                                <select id="disabledSelect" class="form-select" name='agama_id' required>
                                    <option value="">-- Pilih Agama --</option>
                                    @foreach ($agama as $item)
                                        <option value="{{ $item->agama_id }}">{{ $item->nama_agama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-dark">Simpan</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
</div>

<script>
    $('#provinsi_alamat').change(function () {
        var provinsi_id = this.value;
        fetch('http://127.0.0.1:8000/getkota?'+ new URLSearchParams({
            provinsi_id: provinsi_id
        }))
        .then(response => response.json())
        .then(data => {
            $('#kota_alamat').empty();
            data.forEach(function(kota) {
                $('#kota_alamat').append($('<option>').text(kota.nama_kota).attr('value', kota.kota_id));
            });
        });
    });
</script>

@endsection
