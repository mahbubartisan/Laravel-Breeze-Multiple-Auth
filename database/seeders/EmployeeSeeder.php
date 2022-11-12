<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\Employee::factory()->create([
            'firstname' => 'alhossain',
            'email' => 'my@gmail.com',
            'password' => bcrypt('secret'),
        ]);
    }
}
