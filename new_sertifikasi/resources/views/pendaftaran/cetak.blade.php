<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    .mb-3{
        margin-bottom: 10px; 
    }
</style>
<body>
    <div class="">
        <div class="heading-tabel">
            <div class="heading-tabel-keberangkatan">
                <h1 class="border-bottom border-dark mb-5">Detail Data Calon Mahasiswa</h1>
            </div>
            <fieldset enabled>
                <div class="mb-3">
                    <label for="nama_lengkap" class="form-label">Nama Lengkap : {{$pendaftaran->nama_lengkap}}</label>
                </div>
                <div class="mb-3">
                    <label for="nik" class="form-label">NIK : {{$pendaftaran->nik}}</label>
                </div>
                <div class="mb-3">
                    <label for="alamat_ktp" class="form-label">Alamat KTP : {{$pendaftaran->alamat_KTP}}</label>
                </div>
                <div class="mb-3">
                    <label for="alamat_lengkap" class="form-label">Alamat Lengkap Saat Ini : {{$pendaftaran->alamat_lengkap}}</label>
                </div>
                <div class="mb-3">
                    <label for="alamat_lengkap" class="form-label">Alamat Kota : {{$pendaftaran->kota_alamat->nama_kota}}</label>
                </div>
                <div class="mb-3">
                    <label for="kecamatan" class="form-label">Kecamatan : {{$pendaftaran->kecamatan}}</label>
                </div>
                <div class="mb-3">
                    <label for="nomor_telepon" class="form-label">Nomor Telepon : {{$pendaftaran->nomor_telepon}}</label>
                </div>
                <div class="mb-3">
                    <label for="nomor_hp" class="form-label">Nomor HP : {{$pendaftaran->nomor_hp}}</label>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email : {{$pendaftaran->email}}</label>
                </div>
                <div class="mb-3">
                    <label class="form-label">Kewarganegaraan : @php if('wni_asli' == $pendaftaran->kewarganegaraan){
                            echo "WNI Asli";
                        } elseif ('wni_keturunan' == $pendaftaran->kewarganegaraan) { 
                            echo "WNI Keturunan";
                        } else { 
                            echo "WNA";
                        }@endphp</label>
                </div>
                <div class="mb-3">
                    <label for="negara_asal" class="form-label">Negara Asal : {{$pendaftaran->negara_asal}}</label>
                </div>
                <div class="mb-3">
                    <label for="tanggal_lahir">Tanggal Lahir : {{$pendaftaran->tanggal_lahir}}</label>
                </div>
                <div class="mb-3">
                    <label for="tempat_lahir" class="form-label">Tempat Lahir : {{$pendaftaran->tempat_lahir}}</label>
                </div>
                <div class="mb-3">
                    <label for="alamat_lengkap" class="form-label">Kota Lahir : {{$pendaftaran->kota_lahir->nama_kota}}</label>
                </div>
                <div class="mb-3">
                    <label for="negara_lahir" class="form-label">Negara Lahir : {{$pendaftaran->negara_lahir}}</label>
                </div>
                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin : {{$pendaftaran->jenis_kelamin}}</label>
                </div>
                <div class="mb-3">
                    <label for="status_menikah" class="form-label">Status Menikah : {{$pendaftaran->status_menikah}}</label>
                </div>
                <div class="mb-3">
                    <label for="alamat_lengkap" class="form-label">Agama : {{$pendaftaran->agama->nama_agama}}</label>
                </div>
            </fieldset>
        </div>
    </div>
</body>

</html>
