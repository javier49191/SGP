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
        User::create([
        	'name' => 'Secretaria',
        	'email' => 'secretaria@secretaria.com',
        	'email_verified_at' => now(),
        	'password' => bcrypt('secretaria123'),
        	'remember_token' => Str::random(10),
        ]);
        User::create([
        	'name' => 'Encargado de cuentas',
        	'email' => 'encargado@encargado.com',
        	'email_verified_at' => now(),
        	'password' => bcrypt('encargado123'),
        	'remember_token' => Str::random(10),
        ]);
    }
}
