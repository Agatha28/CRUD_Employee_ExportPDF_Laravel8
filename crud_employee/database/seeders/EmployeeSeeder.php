<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->([
            'name' => 'Agatha Santoso',
            'jeniskelamin' => 'female',
            'notelpon'=> '081275548770',
        ]);
    }
}
