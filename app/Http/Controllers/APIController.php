<?php

namespace App\Http\Controllers;

use App\Helpers\ApiFormatter;
use App\Models\City;
use App\Models\Cultural;
use App\Models\Encyclopedia;
use App\Models\Testimonial;
use App\Models\Tourism;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class APIController extends Controller
{
  
  public function cities(){
    return ApiFormatter::createApi(200,"Success",City::all());
  }
  public function city(City $city){  
    return ApiFormatter::createApi(200,"Success",$city);
  }
  public function cultural(Cultural $cultural){  
    return ApiFormatter::createApi(200,"Success",$cultural);
  }
  public function encyclopedia(Encyclopedia $encyclopedia){  
    return ApiFormatter::createApi(200,"Success",$encyclopedia);
  }
  public function testimonial(Testimonial $testimonial){  
    return ApiFormatter::createApi(200,"Success",$testimonial);
  }
  public function tourism(Tourism $tourism){  
    return ApiFormatter::createApi(200,"Success",$tourism);
  }

}
