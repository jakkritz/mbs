<?php

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
        if(!DB::table('users')->count()){
            DB::table('users')->insert([
                'name' => 'admin',
                'email' => 'admin@erawancms.com',
                'password' => bcrypt('erawan'),
                'department_id' => 5,
                'position_id' => 4,
                'activated' => 1,
                'line_code' => 123456,
                'birth_date' => '1990-10-01'
            ]);
        }
    }
}
