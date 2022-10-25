<?php

namespace Database\Seeders;

use App\Models\Configuration;
use App\Models\Departament;
use App\Models\Employee;
use App\Models\Theme;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // // user and configuration models
        // $user = User::factory(1)->create();
        // $themes = Theme::factory(1)->create();
        // $configuration = Configuration::factory(1)->create();

        // // departament and employee models
        // $departaments = Departament::factory(4)->create();
        $employees = Employee::factory(10000)->create();

    }
}
