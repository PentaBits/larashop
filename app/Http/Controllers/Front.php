<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Request as facadereq;
use Illuminate\Support\Facades\Redirect;
use Cart;

use App\Brand;
use App\Product;
use App\Category;
use App\Post;


use App\User;
use Illuminate\Support\Facades\Auth;

class Front extends Controller
{
    private $brands;
    private  $products;
    private  $categories;
    private $title;
    private $description;
    

    public function __construct() {
        $this->brands = Brand::all('name');
        $this->categories = Category::all('name');
        $this->products =  Product::all('id','name','price');
    }


    public function index()
    {
        return view('home', array(
            'page' => 'home',
            'title'=>'Welcome',
            'description'=>'',
            'brands'=>  $this->brands,
            'categories'=>  $this->categories,
            'products'=>  $this->products));
    }
    
    public function products()
    {
        return view('products',
                array('page'=>'products',
                    'title'=>'Product Listing',
                    'description'=>'',
                    'brands'=>  $this->brands,
                    'categories'=>  $this->categories,
                    'products'=>  $this->products));
    }
    public function product_details($id)
    {
        $product = Product::find($id);
        return view('product_details',
                array('product' => $product, 
                    'title' => $product->name,'description' => '',
                    'page' => 'products', 
                    'brands' => $this->brands, 
                    'categories' => $this->categories, 
                    'products' => $this->products));
    }
    public function product_categories($name)
    {
         return view('products', 
                 array('title' => 'Welcome',
                     'description' => '',
                     'page' => 'products', 
                     'brands' => $this->brands,
                     'categories' => $this->categories,
                     'products' => $this->products));
    }
    public function product_brands($name, $category = null)
    {
         return view('products', 
                 array('title' => 'Welcome',
                     'description' => '',
                     'page' => 'products', 
                     'brands' => $this->brands, 
                     'categories' => $this->categories, 
                     'products' => $this->products));
    }
    public function blog()
    {
        $post = post::where('id','>',0)->paginate(3);
        $post->setPath('blog');
        $data['posts']= $post;
        
        return view('blog',
                array(
                    'data'=>$data,
                    'title' => 'Welcome',
                    'description' => '',
                    'page' => 'blog', 
                    'brands' => $this->brands,
                    'categories' => $this->categories, 
                    'products' => $this->products));
        
    }
    
    public function blog_post($url)
    {
        
        $post = Post::whereUrl($url)->first();
        
        
        $tags = $post->tags;
        
        
        $prev_url = Post::prevBlogPostUrl($post->id);
        $next_url = Post::nextBlogPostUrl($post->id);
        $title = $post->title;
        $description = $post->description;
        $page = 'blog';
        $brands = $this->brands;
        $categories = $this->categories;
        $products = $this->products;

    $data = compact('prev_url', 'next_url', 'tags', 'post', 'title', 'description', 'page', 'brands', 'categories', 'products');
   return view('blog_post', array(
       'data' => $data, 'title' => 'Latest Blog Posts',
       'description' => '', 'page' => 'blog', 'brands' => $this->brands, 'categories' => $this->categories,
       'products' => $this->products));
    //return view('blog_post', $data);
    }
    
    public function contact_us() 
    {
        return view('contact_us', 
                array('title' => 'Welcome',
                    'description' => '',
                    'page' => 'contact_us',
                    'brands' => '',
                    'categories' => '',
                    'products' => ''));
    }

    public function login() 
    {
        return view('login', 
                array('title' => 'Welcome',
                    'description' => '',
                    'page' => 'home'));
    }

  

    public function cart()
    {
        
        if(facadereq::isMethod('post'))
        {
            $product_id = facadereq::get('product_id');
            $product = Product::find($product_id);
            Cart::add(array('id'=>$product->id,'name'=>$product->name,'price'=>$product->price,'qty'=>1));
        }
        
        
        // increment the quantity
            if(facadereq::get('product_id') && (facadereq::get('increment'))==1)
            {
                
                $item = Cart::search(function($key, $value) { return $key->id == facadereq::get('product_id'); })->first();
                Cart::update($item->rowId, $item->qty + 1);
               
            }
            
        
            if(facadereq::get('product_id') && (facadereq::get('decrease'))==1)
            {
               $item = Cart::search(function($key, $value) { return $key->id == facadereq::get('product_id'); })->first();
                Cart::update($item->rowId, $item->qty - 1);
                        
            }
        
            
            if(facadereq::get('product_id')&& (facadereq::get('remove')==1))
            {
                $item = Cart::search(function($key, $value) { return $key->id == facadereq::get('product_id'); })->first();
                Cart::remove($item->id);
            }
            $cart = Cart::content();
        
        
        return view('cart', array('cart'=>$cart,'title' => 'Welcome','' => '','page' => 'home'));
    }

    public function checkout()
    {
        return view('checkout', array(
            'title' => 'Welcome',
            'description' => '',
            'page' => 'home'));
    }

    public function search($query)
    {
        return view('products', array(
            'title' => 'Welcome',
            'description' => '',
            'page' => 'products'));
    }
    
    
    public function register()
    {
        if(facadereq::isMethod('post'))
        {
            User::create([
                'name' => facadereq::get('name'),
                    'email' => facadereq::get('email'),
                    'password' => bcrypt(facadereq::get('password')),
            ]);
        }
        
        return Redirect::away('login');
    }
    public function  authenticate()
    {
        if(Auth::attempt(['email'=>  facadereq::get('email'),'password'=>  facadereq::get('password')]))
        {
            return redirect()->intended('checkout');
        }else
            {
            return view('login',array('title' => 'Welcome', 'description' => '', 'page' => 'home'));
            }
    }
    
    public function logout()
    {
        Auth::logout();
        return Redirect::away('login');
    }
    
    
}
