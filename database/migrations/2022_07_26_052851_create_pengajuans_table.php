<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('dokter_id');
            // $table->string('nmpemohon');
            // $table->string('email');
            // $table->string('notlp');
            $table->string('hubungan');
            $table->string('no_rm');
            $table->string('nm_pasien');
            $table->date('tgl_lahir');
            $table->date('tgl_rawat');
            $table->string('nm_asuransi');
            // $table->string('nm_dokter')->nullable();
            $table->string('file_asuransi');
            $table->string('file_suratkuasa')->nullable();
            $table->string('status')->default('menunggu')->fullText();
            $table->string('tgl_pengambilan')->nullable();
            $table->string('komentar')->nullable();
            $table->string('nmpengambil')->nullable();
            $table->string('statuspengambilan')->default('Belum Diambil');
            $table->timestamps();
            // $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengajuans');
    }
};