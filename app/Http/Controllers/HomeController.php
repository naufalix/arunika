<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Testimonial;
use App\Models\Tourism;

class HomeController extends Controller
{

    public function index(){
        return view('home',[
            "cities" => City::orderBy('id', 'ASC')->get(),
            "tourisms" => Tourism::orderBy('name', 'ASC')->get(),
            "testimonials" => Testimonial::orderBy('updated_at', 'DESC')->get(),
        ]);
    }

}
