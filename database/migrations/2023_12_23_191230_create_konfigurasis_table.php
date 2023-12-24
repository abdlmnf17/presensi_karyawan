<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKonfigurasisTable extends Migration
{
    public function up()
    {
        Schema::create('konfigurasis', function (Blueprint $table) {
            $table->id();
            $table->string('status_presensi')->default('ditutup');
            $table->timestamps();
            $table->time('jam_buka')->nullable();
            $table->time('jam_tutup')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('konfigurasis');
    }
}
