<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$superadmin = User::create([
            'name' => 'SuperUser',
            'email' => 'superuser@gmail.com',
            'password' => Hash::make('12345678')
        ]);
        $superadmin->assignRole('superuser');
    }
}
