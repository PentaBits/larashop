<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Base
{
    protected $primaryKey = 'id';
    protected  $table='brands';
    protected  $fillable =  array('name','created_at_ip','updated_at_ip');
    
    
    
}
