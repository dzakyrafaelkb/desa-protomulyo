<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('nama_lengkap');
            $table->timestamps();
        });
        DB::table('users')->insert([
            'username'     => 'admin',
            'password'     => 'admin123',
            'nama_lengkap' => 'Administrator Desa',
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);
    }
    public function down(): void { Schema::dropIfExists('users'); }
};
