<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pendaftaran', function (Blueprint $table) {
            //id
            $table->biginteger('pendaftaran_id')->unsigned()->autoIncrement();
            $table->biginteger('user_id')->unsigned();
            $table->biginteger('agama_id')->unsigned();
            $table->biginteger('kota_alamat_id')->unsigned();
            $table->biginteger('kota_lahir_id')->nullable()->unsigned();

            //nama
            $table->string('nama_lengkap', 24);

            // alamat
            $table->string('alamat_KTP',64);
            $table->string('alamat_lengkap',64);
            
            // Kecamatan
            $table->string('kecamatan',24);
            
            // Kontak 
            $table->string('nomor_telepon',12);
            $table->string('nomor_hp',12);
            $table->string('email',12);

            // kewarganegaraan
            $table->enum('kewarganegaraan', ['wni_asli', 'wni_keturunan', 'wna']);
            $table->string('negara_asal',24)->nullable()->default('indonesia');

            // ttd
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->string('negara_lahir',24)->nullable()->default('indonesia');

            // bio
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->enum('status_menikah', ['belum_menikah', 'menikah', 'lain_lain']);

            $table->timestamps();

            $table->foreign('user_id')->references('user_id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('agama_id')->references('agama_id')->on('agama')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('kota_alamat_id')->references('kota_id')->on('kota')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('kota_lahir_id')->references('kota_id')->on('kota')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran');
    }
};
