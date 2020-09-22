<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_education', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('members_id');
            $table->string('nama_sekolah');
            $table->string('jenjang');
            $table->string('bidang_studi');
            $table->timestamp('tanggal_masuk');
            $table->timestamp('tanggal_keluar');
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
        Schema::dropIfExists('member_education');
    }
}
