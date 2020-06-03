<?php

use Illuminate\Database\Seeder;
//use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

class DemoSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker\Factory::create();           
        
        for($i=1; $i<100; $i++) {
            DB::table('demos')->insert([
                'title'   => $faker->sentence,
                'text'   => $faker->paragraph,
                'choice' => $faker->randomElement(['a','b','c','d','e','f'])                
            ]);            
        }
    }
}
