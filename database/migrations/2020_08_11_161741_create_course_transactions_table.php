<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_packages_id')->constrained();
            $table->foreignId('users_id')->constrained();
            $table->integer('transaction_total')->constrained();
            $table->string('transaction_status')->constrained();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_transactions', function(Blueprint $table){
            $table->dropSoftDeletes();
        });
    }
}
