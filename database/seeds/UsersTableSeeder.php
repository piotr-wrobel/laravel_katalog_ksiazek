<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'test';
        $user->email = 'test@domain.com';
        $user->password = bcrypt('test');
        $user->save();
    }
}
