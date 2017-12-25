<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    protected $primaryKey = 'id';
    protected $table='blog_catrgories' ;
    protected $fillable = array('id','category');
}
