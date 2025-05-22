<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'admin', // pastikan kolom ini ada
            'password' => Hash::make('admin123'), // password akan di-hash
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'role' => '1'
        ]);
        DB::table('users')->insert([
            'username' => 'user1', // pastikan kolom ini ada
            'password' => Hash::make('user123'), // password akan di-hash
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'role' => '0'
        ]);
    }
}
