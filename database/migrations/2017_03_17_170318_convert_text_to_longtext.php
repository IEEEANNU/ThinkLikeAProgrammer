<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConvertTextToLongtext extends Migration
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
            DB::statement('ALTER TABLE questions MODIFY  blocks  LONGTEXT;');
            DB::statement('ALTER TABLE questions MODIFY  description LONGTEXT;');
            DB::statement('ALTER TABLE questions MODIFY  hint_text LONGTEXT;');
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
            //
        });
    }
}
