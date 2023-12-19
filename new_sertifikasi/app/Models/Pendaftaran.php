<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;
    protected $table = 'pendaftaran';
    protected $primaryKey = 'pendaftaran_id';
    
    protected $fillable = [
        'user_id',
        'foto',
        'kota_lahir_id',
        'kota_alamat_id',
        'agama_id',
        'nama_lengkap',
        'nik',
        'alamat_ktp',
        'alamat_lengkap',
        'kecamatan',
        'nomor_telepon',
        'nomor_hp',
        'email',
        'kewarganegaraan',
        'negara_asal',
        'tanggal_lahir',
        'tempat_lahir',
        'negara_lahir',
        'jenis_kelamin',
        'status_menikah'
    ];
    
    
    public function agama()
    {
        return $this->belongsTo(Agama::class, 'agama_id', 'agama_id');
    }
    public function kota_alamat()
    {
        return $this->belongsTo(Kota::class, 'kota_alamat_id', 'kota_id');
    }
    public function kota_lahir()
    {
        return $this->belongsTo(Kota::class, 'kota_lahir_id', 'kota_id');
    }
}
