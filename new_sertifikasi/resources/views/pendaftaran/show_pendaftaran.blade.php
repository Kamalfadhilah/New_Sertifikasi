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
        <div class="container">
            <div class="tabel-pendaftaran">
                <div class="heading-tabel">
                    <div class="heading-tabel-keberangkatan">
                        <h1>Tabel Pendaftaran</h1>

                        <div class="button-tambah-pendaftaran">
                            <a class="btn btn-dark" href="{{ url('pendaftaran/add_pendaftaran') }}" role="button">Tambah Pendaftaran</a>
                        </div>
                    </div>
                    <div class="body-tabel-pendaftaran" style="overflow-x: scroll;">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Lengkap</th>
                                    <th scope="col">Alamat KTP</th>
                                    <th scope="col">Alamat Lengkap</th>
                                    <th scope="col">Kabupaten/Kota Alamat</th>
                                    <th scope="col">Kabupaten/Kota Lahir</th>
                                    <th scope="col">Negara Lahir</th>
                                    <th scope="col">Kecamatan</th>
                                    <th scope="col">Nomor Telephone</th>
                                    <th scope="col">Nomor HP</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Kewarganegaraan</th>
                                    <th scope="col">Tempat Lahir</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Status Pernikahan</th>
                                    <th scope="col">Agama</th>
                                    <th scope="col">...</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pendaftaran as $index => $item)
                                <tr>
                                    <th scope="row">{{ $index + 1 }}</th>
                                    <td>{{ $item->nama_lengkap}}</td>
                                    <td>{{ $item->alamat_KTP}}</td>
                                    <td>{{ $item->alamat_lengkap}}</td>
                                    <td>{{ $item->kota_alamat->nama_kota}}</td>
                                    <td>{{ $item->kota_lahir ? $item->kota_lahir->nama_kota : ''}}</td>
                                    <td>{{ $item->negara_lahir}}</td>
                                    <td>{{ $item->kecamatan}}</td>
                                    <td>{{ $item->nomor_telepon}}</td>
                                    <td>{{ $item->nomor_hp}}</td>
                                    <td>{{ $item->email}}</td>
                                    <td>{{ $item->kewarganegaraan}}</td>
                                    <td>{{ $item->tempat_lahir}}</td>
                                    <td>{{ $item->jenis_kelamin}}</td>
                                    <td>{{ $item->status_pernikahan}}</td>
                                    <td>{{ $item->agama->nama_agama}}</td>
                                    <td>
                                        <a class="btn btn-dark" href="{{ url('cetak_pdf/'. $item->pendaftaran_id .'') }}" role="button">Cetak</a>
                                        <a class="btn btn-dark" href="{{ url('pendaftaran/detail_pendaftaran/'. $item->pendaftaran_id .'') }}" role="button">Detail</a>
                                        <a class="btn btn-dark" href="{{ url('pendaftaran/edit_pendaftaran/'. $item->pendaftaran_id .'') }}" role="button">Edit</a>
                                        <a class="btn btn-dark" href="{{ url('pendaftaran/destroy/'. $item->pendaftaran_id .'') }}" role="button">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
