<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_experiences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('members_id');
            $table->string('nama_perusahaan');
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
        Schema::dropIfExists('member_experiences');
    }
}
