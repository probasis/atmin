<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TreeSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker\Factory::create();           
        
        for($i=1; $i<10; $i++) {
            DB::table('blog_posts')->insert([
                'title' => $faker->sentence,
                'date'  => $faker->date,                
                'text'  => $faker->paragraph,                
            ]);            
        }
        
        for($i=1; $i<100; $i++) {
            DB::table('blog_comments')->insert([
                'post_id' => rand(1,10),                
                'author' => $faker->name,
                'date'    => $faker->date,                
                'text'    => $faker->paragraph,                
            ]);            
        }
        
    }
}

