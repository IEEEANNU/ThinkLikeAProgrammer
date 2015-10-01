<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Question;

class QuestionTableSeeder extends Seeder {

    public function run()
    {
        DB::table('questions')->truncate();

        Question::insert([
            // Your Questions here..
        ]);
    }

}
