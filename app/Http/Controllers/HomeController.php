<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\City;

class HomeController extends Controller
{

    public function index(){
        return view('home',[
            "cities" => City::orderBy('id', 'ASC')->get(),
            //"testimonials" => Testimonial::orderBy('updated_at', 'DESC')->get(),
        ]);
    }

}
