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
        User::truncate();

        $faker = \Faker\Factory::create();

        $password = Hash::make('password');

        User::create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'password' => $password,
            'is_admin' => 1,
        ]);

        for ($i = 0; $i < 10; ++$i) {
            User::create([
                'name' => $faker->name(),
                'email' => $faker->unique()->safeEmail,
                'password' => $password,
            ]);
        }
    }
}
