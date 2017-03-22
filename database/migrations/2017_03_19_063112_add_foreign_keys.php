<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('questions', function (Blueprint $table) {
            //
           $table->foreign('level_id')->references('id')->on('levels');
        });
        Schema::table('submissions', function (Blueprint $table) {
            //
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('question_id')->references('id')->on('questions');
        });
        Schema::table('assessments', function (Blueprint $table) {
            //
            $table->foreign('submission_id')->references('id')->on('submissions')->onDelete('cascade');
        });
        Schema::table('question_observations', function (Blueprint $table) {
            //
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->dropForeign(['level_id']);

        });
        Schema::table('submissions', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['question_id']);

        });
        Schema::table('assessments', function (Blueprint $table) {
            $table->dropForeign(['submission_id']);

        });
        Schema::table('question_observations', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['question_id']);

        });
    }
}
