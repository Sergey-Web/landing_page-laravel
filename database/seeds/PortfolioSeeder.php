<?php

use Illuminate\Database\Seeder;
use App\Portfolio;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Portfolio::create(
            [
                'name'   => 'Finance App',
                'images' => 'portfolio_pic2.jpg',
                'tags'   => 'GPS'
            ]
        );

        Portfolio::create(
            [
                'name'   => 'Concept',
                'images' => 'portfolio_pic3.jpg',
                'tags'   => 'disign'
            ]
        );

        Portfolio::create(
            [
                'name'   => 'Shooping',
                'images' => 'portfolio_pic4.jpg',
                'tags'   => 'android'
            ]
        );

        Portfolio::create(
            [
                'name'   => 'Managment',
                'images' => 'portfolio_pic5.jpg',
                'tags'   => 'disign'
            ]
        );

        Portfolio::create(
            [
                'name'   => 'iPhone',
                'images' => 'portfolio_pic6.jpg',
                'tags'   => 'web'
            ]
        );

        Portfolio::create(
            [
                'name'   => 'Nexus',
                'images' => 'portfolio_pic7.jpg',
                'tags'   => 'web'
            ]
        );

        Portfolio::create(
            [
                'name'   => 'Android',
                'images' => 'portfolio_pic8.jpg',
                'tags'   => 'android'
            ]
        );
    }
}
