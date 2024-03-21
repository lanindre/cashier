<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('karyawan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nip',12)->nullable();
            $table->string('nik',12);
            $table->string('nama',100);
            $table->enum('jenis_kelamin', ['Laki-laki','Perempuan']);
            $table->string('tempat_lahir',100);
            $table->date('tanggal_lahir');
            $table->string('telepon', 13)->nullable();
            $table->string('agama',15);
            $table->enum('status_nikah', ['belum nikah','nikahh']);
            $table->text('alamat');
            $table->string('foto');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawan');
    }
};
