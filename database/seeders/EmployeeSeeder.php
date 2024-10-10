<?php

namespace Database\Seeders;

use App\Models\Emlpoyee;
use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = [
            [
                'address' => 'jl.santai',
                'place_of_birth' => 'oekanbaru',
                'dob' =>'_',
                'religion' => '_',
                'sex' => '_',
                'phone' => '_',
                'salary' => '_',
            ],
            [
                'address' => 'jl.mantan',
                'place_of_birth' => 'jakarta',
                'dob' =>'_',
                'religion' => '_',
                'sex' => '_',
                'phone' => '_',
                'salary' => '_',
            ],
        ];
        
       foreach($employees as $employee) {
            Employee::create($employee);
        }
    }
}
