<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;
class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
    {
        Department::create(['dept_name' => 'Computer Science', 'manager_id' => 101, 'location_id' => 1]);
        Department::create(['dept_name' => 'Management Information System', 'manager_id' => 102, 'location_id' => 2]);
        Department::create(['dept_name' => 'Design & Multimedia', 'manager_id' => 103, 'location_id' => 3]);
        Department::create(['dept_name' => 'AI Engineering', 'manager_id' => 104, 'location_id' => 4]);
    }
}
