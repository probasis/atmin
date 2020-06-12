<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker\Factory::create();           
        
        DB::table('catalogs')->insert([
            ['id'=>1, 'title'=>'Electronics', 'description'=>$faker->paragraph],
            ['id'=>2, 'title'=>'Сlothes',     'description'=>$faker->paragraph],
            ['id'=>3, 'title'=>'Food',        'description'=>$faker->paragraph],            
        ]); 
                
        $cats = [
            ['id'=>10, 'catalog_id'=>1,  'title'=>'Laptops',            'sort'=>100, 'description'=>$faker->paragraph],
                ['id'=>11, 'category_id'=>10, 'title'=>'Netbooks',      'sort'=>110, 'description'=>$faker->paragraph],
                ['id'=>12, 'category_id'=>10, 'title'=>'For gameing',   'sort'=>120, 'description'=>$faker->paragraph],
                ['id'=>13, 'category_id'=>10, 'title'=>'Professional',  'sort'=>130, 'description'=>$faker->paragraph],            
            ['id'=>20, 'catalog_id'=>1, 'title'=>'Smartphones',         'sort'=>140, 'description'=>$faker->paragraph],
                ['id'=>21, 'category_id'=>20, 'title'=>'iOS',           'sort'=>150, 'description'=>$faker->paragraph],
                ['id'=>22, 'category_id'=>20, 'title'=>'Android',       'sort'=>160, 'description'=>$faker->paragraph],            
            ['id'=>30, 'catalog_id'=>1, 'title'=>'Tablets',             'sort'=>170, 'description'=>$faker->paragraph],            
                ['id'=>31, 'category_id'=>30, 'title'=>'iOS',           'sort'=>180, 'description'=>$faker->paragraph],
                ['id'=>32, 'category_id'=>30, 'title'=>'Android',       'sort'=>190, 'description'=>$faker->paragraph],
                ['id'=>33, 'category_id'=>30, 'title'=>'Windows',       'sort'=>200, 'description'=>$faker->paragraph],            
            ['id'=>40, 'catalog_id'=>1, 'title'=>'Printers',            'sort'=>210, 'description'=>$faker->paragraph],            
                ['id'=>41, 'category_id'=>40, 'title'=>'Laser',         'sort'=>220, 'description'=>$faker->paragraph],            
                ['id'=>42, 'category_id'=>40, 'title'=>'Inkjet',        'sort'=>230, 'description'=>$faker->paragraph],            
            ['id'=>50, 'catalog_id'=>1, 'title'=>'Accesories',          'sort'=>240, 'description'=>$faker->paragraph],          
            
            ['id'=>200, 'catalog_id'=>2,  'title'=>'Mans',          'sort'=>100, 'description'=>$faker->paragraph],
            ['id'=>201, 'catalog_id'=>2,  'title'=>'Womans',        'sort'=>110, 'description'=>$faker->paragraph],
            ['id'=>202, 'catalog_id'=>2,  'title'=>'Kids',          'sort'=>120, 'description'=>$faker->paragraph],
            
            ['id'=>301, 'catalog_id'=>3,  'title'=>'Fruits',          'sort'=>100, 'description'=>$faker->paragraph],
            ['id'=>302, 'catalog_id'=>3,  'title'=>'Vegetables',      'sort'=>110, 'description'=>$faker->paragraph],
            ['id'=>303, 'catalog_id'=>3,  'title'=>'Drings',          'sort'=>120, 'description'=>$faker->paragraph],            
            ['id'=>304, 'catalog_id'=>3,  'title'=>'Candies',         'sort'=>130, 'description'=>$faker->paragraph],            
        ];
        foreach($cats as $c) {
            DB::table('categories')->insert($c);         
        }
        
        for($c=1; $c<=100; $c++) {
            DB::table('products')->insert([
                'category_id' => $faker->randomElement([10,11,12,13,20,21,22,30,31,32,33,40,41,42,50,  200,201,202,  301,302,303,304]),
                'title' => $faker->sentence(2),
                'price' => rand(100, 1000)*10,
                'quantity' => rand(10, 100),
                'description' => $faker->paragraph,
                'photo' => $faker->slug.'.jpg'                
            ]);         
        }       
        
        for($c=1; $c<=500; $c++) {
            DB::table('reviews')->insert([
                'product_id' => rand(1,100),                
                'time' => $faker->dateTime,
                'author' => $faker->name,                
                'text' => $faker->paragraph,                
            ]);                     
        }
        
        for($c=1; $c<=500; $c++) {
            DB::table('photos')->insert([
                'product_id' => rand(1,100),
                'sort' => $c*10,
                'title' => $faker->sentence(3),
                'photo' => $faker->slug.'.jpg'                
            ]);                     
        } 
        
        $pages = [
            ['id'=>10, 'page_id'=>null,  'title'=>'About',          'sort'=>110, 'html'=>$faker->paragraph],
                ['id'=>11, 'page_id'=>10,  'title'=>'Company',      'sort'=>120, 'html'=>$faker->paragraph],
                ['id'=>12, 'page_id'=>10,  'title'=>'History',      'sort'=>130, 'html'=>$faker->paragraph],
                ['id'=>13, 'page_id'=>10,  'title'=>'Team',         'sort'=>140, 'html'=>$faker->paragraph],
                    ['id'=>15, 'page_id'=>13,  'title'=>'Administration',   'sort'=>10, 'html'=>$faker->paragraph],
                    ['id'=>16, 'page_id'=>13,  'title'=>'Sales area',       'sort'=>20, 'html'=>$faker->paragraph],
                    ['id'=>17, 'page_id'=>13,  'title'=>'Delivery',         'sort'=>20, 'html'=>$faker->paragraph],
                ['id'=>14, 'page_id'=>10,  'title'=>'Vacancies',    'sort'=>150, 'html'=>$faker->paragraph],                
            ['id'=>20, 'page_id'=>null,  'title'=>'Warehouses',     'sort'=>160, 'html'=>$faker->paragraph],
                ['id'=>21, 'page_id'=>20,  'title'=>'North',        'sort'=>170, 'html'=>$faker->paragraph],
                ['id'=>22, 'page_id'=>20,  'title'=>'South',        'sort'=>180, 'html'=>$faker->paragraph],
                ['id'=>23, 'page_id'=>20,  'title'=>'East',         'sort'=>190, 'html'=>$faker->paragraph],
                ['id'=>24, 'page_id'=>20,  'title'=>'West',         'sort'=>200, 'html'=>$faker->paragraph],
            ['id'=>30, 'page_id'=>null,  'title'=>'Price list',     'sort'=>210, 'html'=>$faker->paragraph],
            ['id'=>40, 'page_id'=>null,  'title'=>'Contacts',       'sort'=>220, 'html'=>$faker->paragraph],
        ];
        foreach($pages as $p) {
            DB::table('pages')->insert($p);         
        }        
    }
}

