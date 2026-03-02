<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('berita', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->longText('isi');
            $table->string('gambar')->nullable();
            $table->date('tanggal');
            $table->timestamps();
        });
        Schema::create('perangkat_desa', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jabatan');
            $table->string('foto')->nullable();
            $table->timestamps();
        });
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nik', 16);
            $table->text('isi');
            $table->string('foto')->nullable();
            $table->enum('status',['Pending','Diproses','Selesai'])->default('Pending');
            $table->timestamps();
        });
        Schema::create('dokumen', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('file');
            $table->timestamps();
        });
        Schema::create('galeri', function (Blueprint $table) {
            $table->id();
            $table->string('foto');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('galeri');
        Schema::dropIfExists('dokumen');
        Schema::dropIfExists('pengaduan');
        Schema::dropIfExists('perangkat_desa');
        Schema::dropIfExists('berita');
    }
};
