<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('penduduk', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 16)->unique();
            $table->string('nama');
            $table->enum('jenis_kelamin', ['Laki-laki','Perempuan']);
            $table->string('rt', 5);
            $table->string('rw', 5);
            $table->string('pekerjaan')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('penduduk'); }
};
