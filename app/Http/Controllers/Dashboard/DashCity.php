<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class DashCity extends Controller
{
    public function index(){
        return view('dashboard.city',[
            "title" => "Dashboard | Kota",
            "cities" => City::orderBy("id","ASC")->get(),
        ]);
    }

    public function postHandler(Request $request){
        if($request->submit=="store"){
            $res = $this->store($request);
            return back()->with($res['status'],$res['message']);
        }
        if($request->submit=="update"){
            $res = $this->update($request);
            return back()->with($res['status'],$res['message']);
        }
        if($request->submit=="destroy"){
            $res = $this->destroy($request);
            return back()->with($res['status'],$res['message']);
        }
        else{
            return back()->with("info","Submit not found");
        }
    }

    public function store(Request $request){
        
        $validatedData = $request->validate([
            'name'=>'required',
            'description'=>'required',
            'founded_at'=>'required',
            'population'=>'required',
            'area'=>'required',
            'latitude'=>'required',
            'longitude'=>'required',
        ]);

        City::create($validatedData);
        return ['status'=>'success','message'=>'Kota berhasil ditambahkan'];
    }

    public function update(Request $request){
        
        $validatedData = $request->validate([
            'id'=>'required|numeric',
            'name'=>'required',
            'description'=>'required',
            'founded_at'=>'required',
            'population'=>'required',
            'area'=>'required',
            'latitude'=>'required',
            'longitude'=>'required',
        ]);
        
        $city = City::find($request->id);

        //Check if the city is found
        if($city){
            $city->update($validatedData);
            return ['status'=>'success','message'=>'Kota berhasil diedit']; 
        }else{
            return ['status'=>'error','message'=>'Kota tidak ditemukan'];
        }
    }

    public function destroy(Request $request){
        
        $validatedData = $request->validate([
            'id'=>'required|numeric',
        ]);

        $city = City::find($request->id);

        //Check if the city is found
        if($city){
            City::destroy($request->id);
            return ['status'=>'success','message'=>'Kota berhasil dihapus'];
        }else{
            return ['status'=>'error','message'=>'Kota tidak ditemukan'];
        }
    }

}
