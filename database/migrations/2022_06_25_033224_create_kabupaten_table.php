<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKabupatenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kabupaten', function (Blueprint $table) {
            $table->bigIncrements('kabupaten_id');
            $table->string('no_kabupaten');
            $table->string('nama');
            $table->string('slug');
            $table->unsignedBigInteger('kepulauan_id');
            $table
                ->foreign('kepulauan_id')
                ->references('kepulauan_id')
                ->on('kepulauan')
                ->cascadeOnDelete();
            $table->unsignedBigInteger('provinsi_id');
            $table
                ->foreign('provinsi_id')
                ->references('provinsi_id')
                ->on('provinsi')
                ->cascadeOnDelete();
            $table->timestamp('dibuat_pada');
            $table->timestamp('diubah_pada');
            $table->timestamp('dihapus_pad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kabupaten');
    }
}
