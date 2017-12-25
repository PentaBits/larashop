<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;

class TestController extends Controller
{
    public function index()
    {
     return 'It is a test controller';
    }

    public function setCookie(Request $request)
    {
        $timeduration =1;
        $response = new Response("Hello world");
        $response->withCookie(cookie("name","Abhik",$timeduration));
        return $response;

    }
    public function getCookie(Request $request)
    {
        $valueofcookie = $request->cookie("name");
        echo ($valueofcookie);
    }
}
