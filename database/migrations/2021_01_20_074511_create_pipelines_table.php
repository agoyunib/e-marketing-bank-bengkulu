<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePipelinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pipelines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ao_id')->constrained('users');
            $table->unsignedBigInteger('jenis_produk_id')->constrained('jenis_produks');
            $table->string('no_registrasi');
            $table->string('nm_target');
            $table->string('alamat');
            $table->string('kota');
            $table->string('no_hp');
            $table->enum('kategori',['new','old']);
            $table->string('target_penambahan_dana');
            $table->string('alat_promosi');
            $table->string('total_target');
            $table->enum('periode_target',['bulanan','triwulan']);
            $table->enum('status_realisasi',['target','pipeline','ditolak','berhasil','tidak_berhasil','verified','verification_failed'])->default('target');
            $table->text('keterangan_status')->nullable();
            $table->enum('status_usulan',['1','0'])->default('0');
            $table->date('waktu_mengusulkan')->nullable();
            $table->string('status_final')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pipelines');
    }
}
