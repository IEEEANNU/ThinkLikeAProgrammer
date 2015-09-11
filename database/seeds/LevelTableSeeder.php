<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Level;

class LevelTableSeeder extends Seeder {

    public function run()
    {
        DB::table('levels')->truncate();

        Level::insert([
            ['name' => 'Level 1', 'mark' => 5.0],
            ['name' => 'Level 2', 'mark' => 10.0],
            ['name' => 'Level 3', 'mark' => 15.0],
            ['name' => 'Level 4', 'mark' => 20.0],
            ['name' => 'Level 5', 'mark' => 25.0],
            ['name' => 'Bonus Level', 'mark' => 30.0],
        ]);
    }

}
