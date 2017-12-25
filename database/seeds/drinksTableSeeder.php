<?php

use Illuminate\Database\Seeder;

class drinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('drinks')->insert(["name"=>"Vodka","comments"=>"blood of creativity","rating"=>6,"brew_date"=>"1999-12-03"]);
    }
    
}
