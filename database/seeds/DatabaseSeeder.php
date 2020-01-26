<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            ['name' => 'Angelo', 'email' => 'angelo@example.com'],
            ['name' => 'Caruso', 'email' => 'caruso@example.com'],
            ['name' => 'Chavez', 'email' => 'chavez@example.com'],
            ['name' => 'Tomas', 'email' => 'tomas@example.com'],
            ['name' => 'Pepe', 'email' => 'pepe@example.com']
        ]);
    }
}
