<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaryawansTable extends Migration
{
    public function up()
    {
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->bigInteger('no_id');
            $table->bigInteger('no_kk');
            $table->date('tanggal_lahir');
            $table->string('status');
            $table->string('jenis_kelamin');
            $table->string('agama');
            $table->string('klasifikasi');
            $table->string('jabatan');
            $table->string('telepon');
            $table->string('no_badge');
            $table->decimal('gaji_pokok', 10, 2);
            $table->timestamps();
            $table->unsignedBigInteger('user_id');

            $table->index('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('karyawans');
    }
}
