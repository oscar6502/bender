<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(User::class)->times(10)->create();

        DB::table('users')->insert([
            'name' => 'Oscar',
            'email' => 'oscar.diciomma@alsea.com.ar',
            'password' => Hash::make('admin1295'),
            'admin' => true,
        ]);      
        
        DB::table('users')->insert([
            'name' => 'Lionel',
            'email' => 'lionel.ravagni@alsea.com.ar',
            'password' => Hash::make('admin1295'),
            'admin' => true,
        ]);      
        
        DB::table('users')->insert([
            'name' => 'User',
            'email' => 'user@alsea.com.ar',
            'password' => Hash::make('prueba1295'),
            'admin' => false,
        ]);             

    }
}
