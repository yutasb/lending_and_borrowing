<?php

use Carbon\Carbon as CarbonCarbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'test test',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'pic' => 'aaa',
            'myself' => 'よろしくお願いします',
            'myfav' => 'bbb',
            'created_at' => CarbonCarbon::now(),
            'updated_at' => Carbon::now(),

        ]);
    }
}
