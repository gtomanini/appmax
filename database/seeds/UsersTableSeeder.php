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
        $password = Hash::make('testeappmax');

        User::create([
            'name' => 'Teste',
            'email' => 'teste@appmax.com.br',
            'password' => $password,
        ]);
    }
}
