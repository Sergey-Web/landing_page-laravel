<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PortfolioSeeder::class);
        $this->call(EmployeesSeeder::class);
        $this->call(ServicesSeeder::class);
        $this->call(PagesSeeder::class);
        $this->call(UsersSeeder::class);
    }
}
