<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/hello', function () {
//    return 'hello world';
//});

Route::get('/hello/{name}','Hello@show');

Route::get('/','Front@index');
Route::get('/products','Front@products');
Route::get('/products/details/{id}','Front@product_details');
Route::get('/products/categories','Front@product_categories');
Route::get('/products/brands','Front@product_brands');
Route::get('/blog','Front@blog');
Route::get('/blog/post/{url}','Front@blog_post');
Route::get('/contact-us','Front@contact_us');
Route::get('/login','Front@login');
Route::get('/logout','Front@logout');
Route::get('/cart','Front@cart');
Route::get('/checkout','Front@checkout');
Route::get('/search/{query}','Front@search');


//post method
Route::post('/cart','Front@cart');

//template test

Route::get('blade',function(){
    $datas=array('Sale','Purchase','Sale Return','Purchase Return');
    return view('page',array('name'=>'Jack','day'=>'Friday','data'=>$datas));
});

Route::get('/insert',function(){
    App\Category::create(array('name'=>'Bed Sheet'));
    return 'Record added';
});
//fetching all record using eloquent ORM model
Route::get('/read',function(){
    $category = new App\Category();
    $data = $category->all(array('name','id'));
    echo('<ul>');
    foreach ($data as $list)
    {
        echo('<li>'.$list->name. ' '.$list->id.'</li>');
    }
    echo('</ul');
});

Route::get('/update',function(){
    $category =  App\Category::find(7) ;
    $category->name = 'Music';
    $category->save();
    
    $data = $category->All(array('name','id'));
    
    echo('<ul>');
    foreach ($data as $list)
    {
        echo('<li>'.$list->name. ' '.$list->id.'</li>');
    }
    echo('</ul');
    
});

Route::get('/delete',function(){
    $category = App\Category::find(7);
    $category->delete();
    
    $data = $category->All(array('name','id'));
    
    echo('<ul>');
    foreach ($data as $list)
    {
        echo('<li>'.$list->name. ' '.$list->id.'</li>');
    }
    echo('</ul');
});

//Authentication
Route::get('auth/login','Front@login');
Route::post('auth/login','Front@authenticate');
Route::get('auth/logout','Front@logout');

//Registration 
Route::post('/register','Front@register');


//Check out
Route::get('/checkout',['middleware'=>'auth','uses'=>'Front@checkout']);

Route::get('/api/v1/products/{id?}',['middleware'=>'auth.basic',function($id=NULL){
    if($id==NULL)
    {
        $products = App\Product::all(array('id','name','price')) ;
    }
 else {
        $products = App\Product::find($id,array('id','name','price'));
   }
   return Response::json(array('error'=>false,'products'=>$products,'status_code'=>200));
}]);

Route::get('/api/v1/categories/{id?}',['middleware'=>'auth.basic',function($id=null)
{
    if($id==null)
    {
        $categories = App\Category::all(array('id','name'));
    }
 else {
        $categories = App\Category::find($id,array('id','name'));
    }
    return Response::json(array('error'=>false,'categories'=>$categories,'status_code'=>200));
}]);

Route::get('/api/v1/productcatg',['middleware'=>'auth.basic',function(){
    $product = new App\Product();
    $productcatg = $product->getProductWithCategory();
    
    return Response::json(array('error'=>FALSE,'prodcatg'=>$productcatg,'status_code'=>200));
}]);

Route::get('/testcontroller',['middleware'=>'role:xyz','uses'=>'TestController@index']);

Route::get('/setcookie','TestController@setCookie');
Route::get('/getcookie','TestController@getCookie');