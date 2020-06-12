<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 1)->create([
            'email' => 'adaurum@test.ru'
        ]);
        factory(User::class, 1)->create([
            'email' => 'adaurum3@test.ru'
        ]);
        factory(User::class, 1)->create([
            'email' => 'adaurum2@test.ru'
        ]);
    }
}
