<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->truncate();

        User::create([
            'name' => 'Admin',
            'email' => 'admin',
            'password' => bcrypt(Config::get('constants.DEFAULT_PASSWORD')),
            'is_grader' => true,
        ]);
    }

}
