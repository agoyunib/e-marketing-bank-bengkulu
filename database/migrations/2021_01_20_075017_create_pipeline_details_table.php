<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePipelineDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pipeline_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->constrained('users');
            $table->unsignedBigInteger('pipeline_id')->constrained('pipelines');
            $table->enum('status_realisasi',['target','pipeline','ditolak','berhasil','tidak_berhasil']);
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
        Schema::dropIfExists('pipeline_details');
    }
}
