<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{    
    public function run()
    {
        $this->call(DemoSeeder::class);
        $this->call(TreeSeeder::class);        
    }
}
