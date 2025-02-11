<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class departmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            ["name" => "Accounting"],
            ["name" => "Bussiness Development"],
            ["name" => "Engineering"],
            ["name" => "Human Resources"],
            ["name" => "Legal"],
            ["name" => "Marketing"],
            ["name" => "Product Management"],
            ["name" => "Sales"],
            ["name" => "Training"],
        ];

        Department::insert($departments);
    }
}
