<?php

use Illuminate\Database\Seeder;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!DB::table('positions')->count()){
            DB::table('positions')->insert([
                ['name' => 'Head Admin'],
                ['name' => 'Office Admin'],
                ['name' => 'Factory Admin'],
                ['name' => 'Accounting Admin'],
                ['name' => 'พนักงานขาย']
            ]);
        }
    }
}
