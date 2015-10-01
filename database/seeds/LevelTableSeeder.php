<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Level;

class LevelTableSeeder extends Seeder {

    public function run()
    {
        DB::table('levels')->truncate();

        Level::insert([
            // Your Levels here..
        ]);
    }

}
