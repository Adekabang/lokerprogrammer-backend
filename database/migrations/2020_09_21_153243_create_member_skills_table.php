<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_skills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_skills_id');
            $table->string('skill_name');
            $table->string('skills_persentase');
            $table->timestamps();

            $table->foreign('category_skills_id')->references('id')->on('category_skills')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member_skills');
    }
}
