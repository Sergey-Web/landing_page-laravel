<?php

use Illuminate\Database\Seeder;
use App\Employee;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::create(
            [
                'name'     => 'Tom Rensed',
                'position' => 'Chief Executive Officer',
                'images'   => 'team_pic1.jpg',
                'text'     => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin consequat sollicitudin cursus. Dolor sit amet, consectetur adipiscing elit proin consequat.'
            ]
        );

        Employee::create(
            [
                'name'     => 'Kathren Mory',
                'position' => 'Vice President',
                'images'   => 'team_pic2.jpg',
                'text'     => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin consequat sollicitudin cursus. Dolor sit amet, consectetur adipiscing elit proin consequat.'
            ]
        );
        
        Employee::create(
            [
                'name'     => 'Lancer Jack',
                'position' => 'Senior Manager',
                'images'   => 'team_pic3.jpg',
                'text'     => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin consequat sollicitudin cursus. Dolor sit amet, consectetur adipiscing elit proin consequat.'
            ]
        );
    }
}
