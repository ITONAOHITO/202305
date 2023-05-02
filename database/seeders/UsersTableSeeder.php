<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        for($i=1;$i<=3;$i++) {
            DB::table('users')->insert([
                'name' => 'User'.$i,
                'email' => 'user'.$i.'@example.com',
                'password' => Hash::make('test@1234'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
