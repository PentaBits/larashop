<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BlogCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('blog_catrgories',function(Blueprint $table){
           $table->increments('id');
           $table->string('category')->unique();
           $table->timestamps();
       });
       
       DB::table('blog_catrgories')->insert(['category'=>'WOMEN']);
       DB::table('blog_catrgories')->insert(['category'=>'MEN']);
       DB::table('blog_catrgories')->insert(['category'=>'KIDS']);
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('blog_catrgories');
    }
}
