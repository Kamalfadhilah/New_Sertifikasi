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
                        <h1 class="border-bottom border-dark mb-5">Edit Data Calon Mahasiswa</h1>
                    </div>
                    <form action="{{url('pendaftaran/update/'.$pendaftaran->pendaftaran_id)}}" method="post">
                      @csrf
                      @method('put')

                    <fieldset enabled>
                        <div class="mb-3">
                            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" value="{{$pendaftaran->nama_lengkap}}" class="form-control" id="nama_lengkap" required>
                        </div>
                        <div class="mb-3">
                            <label for="nik" class="form-label">NIK</label>
                            <input type="text" name="nik" value="{{$pendaftaran->nik}}" class="form-control" id="nik" maxlength="16" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat_ktp" class="form-label">Alamat KTP</label>
                            <input type="text" name="alamat_ktp" value="{{$pendaftaran->alamat_KTP}}" class="form-control" id="alamat_ktp" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat_lengkap" class="form-label">Alamat Lengkap Saat Ini</label>
                            <input type="text" name="alamat_lengkap" value="{{$pendaftaran->alamat_lengkap}}" class="form-control" id="alamat_lengkap" required>
                        </div>
                        <div class="mb-3">
                            <label for="disabledSelect" class="form-label">Provinsi</label>
                            <select id="disabledSelect" class="form-select" name='provinsi_alamat' required>
                                <option value="">-- Pilih Provinsi --</option>
                                @foreach ($provinsi as $item)
                                <option value="{{ $item->provinsi_id }}"{{ ($item->provinsi_id == $pendaftaran->provinsi_id  ? "selected":"") }}>{{ $item->nama_provinsi }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="disabledSelect" class="form-label">Alamat Kabupaten/Kota</label>
                            <select id="disabledSelect" class="form-select" name='kota_alamat_id' required>
                                <option value="">-- Pilih Alamat Kota --</option>
                                @foreach ($kota as $item)
                                <option value="{{ $item->kota_id }}" {{ ($item->kota_id == $pendaftaran->kota_alamat_id  ? "selected":"") }}>{{ $item->nama_kota}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="kecamatan" class="form-label">Kecamatan</label>
                            <input type="text" name="kecamatan" value="{{$pendaftaran->kecamatan}}" class="form-control" id="kecamatan" required>
                        </div>
                        <div class="mb-3">
                            <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                            <input type="tel" name="nomor_telepon" value="{{$pendaftaran->nomor_telepon}}" class="form-control" id="nomor_telepon" required>
                        </div>
                        <div class="mb-3">
                            <label for="nomor_hp" class="form-label">Nomor HP</label>
                            <input type="tel" name="nomor_hp" value="{{$pendaftaran->nomor_hp}}" class="form-control" id="nomor_hp" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" value="{{$pendaftaran->email}}" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kewarganegaraan</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kewarganegaraan" id="wni_asli"
                                    value="wni_asli" {{ ('wni_asli' == $pendaftaran->kewarganegaraan  ? "checked":"") }}>
                                <label class="form-check-label" for="wni_asli">WNI</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kewarganegaraan" id="wni_keturunan"
                                    value="wni_keturunan" {{ ('wni_keturunan' == $pendaftaran->kewarganegaraan  ? "checked":"") }}>
                                <label class="form-check-label" for="wni_keturunan">WNI Keturunan</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kewarganegaraan" id="wna"
                                    value="wna" {{ ('wna' == $pendaftaran->kewarganegaraan  ? "checked":"") }}>
                                <label class="form-check-label" for="wna">WNA</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="negara_asal" class="form-label">Negara Asal</label>
                            <input type="text" name="negara_asal" value="{{$pendaftaran->negara_asal}}" class="form-control" id="negara_asal">
                        {{-- </div> --}}
                        <div class="mb-3">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{$pendaftaran->tanggal_lahir}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" value="{{$pendaftaran->tempat_lahir}}" class="form-control" id="tempat_lahir" required>
                        </div>
                        <div class="mb-3">
                            <label for="disabledSelect" class="form-label">Kabupaten/Kota Lahir</label>
                            <select id="disabledSelect" class="form-select" name='kota_lahir_id'>
                                <option value="">-- Pilih Kota Lahir --</option>
                                @foreach ($kota as $item)
                                <option value="{{ $item->kota_id }}"{{ ($item->kota_id == $pendaftaran->kota_lahir_id  ? "selected":"") }}>{{ $item->nama_kota}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="negara_lahir" class="form-label">Negara Lahir</label>
                            <input type="text" name="negara_lahir" value="{{$pendaftaran->negara_lahir}}" class="form-control" id="negara_lahir">
                        </div>
                        <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <label><input type="radio" name="jenis_kelamin" value="laki-laki" {{ ('laki_laki' == $pendaftaran->jenis_kelamin  ? "checked":"") }} />
                                Laki-laki</label>
                            <label><input type="radio" name="jenis_kelamin" value="perempuan" {{ ('perempuan' == $pendaftaran->jenis_kelamin  ? "checked":"") }}/> Perempuan</label>
                        </div>
                        <div class="mb-3">
                            <label for="status_menikah" class="form-label">Status Menikah</label>
                            <label><input type="radio" name="status_menikah" value="belum_menikah" {{ ('belum_menikah' == $pendaftaran->status_menikah  ? "checked":"") }} /> Belum
                                Menikah</label>
                            <label><input type="radio" name="status_menikah" value="menikah" {{ ('menikah' == $pendaftaran->status_menikah  ? "checked":"") }}/> Menikah</label>
                            <label><input type="radio" name="status_menikah" value="lain_lain" {{ ('lain_lain' == $pendaftaran->status_menikah  ? "checked":"") }}/> Lain-Lain</label>
                        </div>
                        <div class="mb-3">
                            <label for="disabledSelect" class="form-label">Agama</label>
                            <select id="disabledSelect" class="form-select" name='agama_id' required>
                                <option value="">-- Pilih Agama --</option>
                                @foreach ($agama as $item)
                                <option value="{{ $item->agama_id }}"{{ ($item->agama_id == $pendaftaran->agama_id  ? "selected":"") }}>{{ $item->nama_agama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button class="btn btn-info waves-effect waves-light mb-4" type="submit">Update</button>
                    </fieldset>
                </div>
            </div>
        </div>

    </div>
</div>
</div>

@endsection
