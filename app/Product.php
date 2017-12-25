<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Base
{
    protected  $primaryKey = 'id';
    protected  $table ='products';
    protected  $fillable = array('category','name','title','description','price','category_id','brand_id','created_at_ip','updated_at_ip');
    
    
    public function getProductWithCategory()
    {
        $sql = "SELECT 
                C.name as category,
                P.name,
                P.price
                 FROM products P
                INNER JOIN
                categories C ON P.category_id = C.id";
        $product_category = $this->SelectQuery($sql);
        
       // var_dump($product_category);
        
        return $product_category;
    }
    
}
