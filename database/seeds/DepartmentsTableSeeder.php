<?php

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!DB::table('departments')->count()){
            DB::table('departments')->insert([
                ['name' => 'เอราวัณเซลล์ทีม 1'],
                ['name' => 'เอราวัณเซลล์ทีม 2'],
                ['name' => 'เอราวัณเซลล์ทีม 3'],
                ['name' => 'เอราวัณเซลล์ทีม 4'],
                ['name' => 'เอราวัณเซลล์ทีม 5'],
                ['name' => 'คชาเคมีเซลล์ทีม'],
                ['name' => 'เอเลฟองเต้เซลล์ทีม 1'],
                ['name' => 'เอเลฟองเต้เซลล์ทีม 2'],
                ['name' => 'โรงงาน'],
                ['name' => 'สำนักงาน'],
                ['name' => 'ลูกค้าเอราวัณ'],
                ['name' => 'ลูกค้าคชา'],
                ['name' => 'ลูกค้าเอเลฟองเต้'],
            ]);
        }
    }
}
