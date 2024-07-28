<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class WeatherController extends Controller
{
public function index(Request $request){
    $weatherResponse = [];
    if($request->isMethod("post")){
        // echo "<h1>Form submitted</h1>" ;
        // die();
        $q=$request->city;
       $response= Http::withHeaders([
        "x-rapidapi-host"=>"weatherapi-com.p.rapidapi.com",
		"x-rapidapi-key"=>"f3f9ce5986msheb6abb6564e827ap1d96c2jsneac9c2c8d368"
])->get("https://weatherapi-com.p.rapidapi.com/forecast.json?q={$q}&days=0");
//   echo "<pre>";
//    print_r($response->json());
   $weatherResponse =$response->json();
    }
    return view("weather",[
        "data"=>$weatherResponse
    ]);
}

}
