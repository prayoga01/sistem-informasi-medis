<?php

use App\Models\Pengajuan;
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
        Schema::create('keputusans', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Pengajuan::class);
            // $table->string('nmpemohon');
            // $table->string('nmpasien');
            // $table->string('no_rm');
            // $table->string('nmasuransi');
            // $table->string('status')->fullText();
            $table->string('keputusan');
            $table->string('nmpengambil');
            $table->string('statuspengambilan')->default('Belum Diambil');
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
        Schema::dropIfExists('keputusans');
    }
};