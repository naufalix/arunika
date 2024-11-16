<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;
use Intervention\Image\Image;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

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
            'image' => 'required|image|file|max:1024',
        ]);

        //Read image
        $manager = new ImageManager(new Driver());
        $image = $manager->read($request->file('image'));
        
        // Resize image
        $maxwidth = 300;
        $maxheight = 300;
        if ($image->width() > $image->height()) {
            if ($image->width() > $maxwidth) {
                $newheight = $image->height() / ($image->width() / $maxwidth);
                $image->resize($maxwidth, $newheight);
            }
        } else {
            if ($image->height() > $maxheight) {
                $newwidth = $image->width() / ($image->height() / $maxheight);
                $image->resize($newwidth, $maxheight);
            }
        }

        //Convert to .webp
        $imageWebp = $image->toWebp(100);
        
        // Upload new image
        $validatedData['image'] = time().".webp";
        $imageWebp->save('assets/img/city/'.$validatedData['image']);

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
            'image' => 'image|file|max:1024',
        ]);
        
        $city = City::find($request->id);

        //Check if the data is found
        if(!$city){
            return ['status'=>'error','message'=>'Kota tidak ditemukan'];
        }
        
        //Check if has image
        if($request->file('image')){

            // Delete old image
            $image_path = public_path().'/assets/img/city/'.$city->image;
            if (file_exists($image_path)) {
                unlink($image_path); // Delete the image file
            }
            
            //Read image
            $manager = new ImageManager(new Driver());
            $image = $manager->read($request->file('image'));
            
            // Resize image
            $maxwidth = 300;
            $maxheight = 300;
            if ($image->width() > $image->height()) {
                if ($image->width() > $maxwidth) {
                    $newheight = $image->height() / ($image->width() / $maxwidth);
                    $image->resize($maxwidth, $newheight);
                }
            } else {
                if ($image->height() > $maxheight) {
                    $newwidth = $image->width() / ($image->height() / $maxheight);
                    $image->resize($newwidth, $maxheight);
                }
            }

            //Convert to .webp
            $imageWebp = $image->toWebp(100);
            
            // Upload new image
            $validatedData['image'] = $validatedData['id'].'-'.time().".webp";
            $imageWebp->save('assets/img/city/'.$validatedData['image']);
            
            $city->update($validatedData);
            return ['status'=>'success','message'=>'Kota berhasil diupdate'];
            
        }else{
            // Update data
            $city->update($validatedData);    
            return ['status'=>'success','message'=>'Kota berhasil diedit'];
        }
    }

    public function destroy(Request $request){
        
        $validatedData = $request->validate([
            'id'=>'required|numeric',
        ]);

        $city = City::find($request->id);

        // Check if the data is found
        if (!$city) {
            return ['status' => 'error', 'message' => 'Kota tidak ditemukan'];
        }

        $image_path = public_path().'/assets/img/city/'.$city->image;

        // Check if the image file exists before attempting to delete it
        if (file_exists($image_path)) {
            unlink($image_path); // Delete the image file
        }

        City::destroy($request->id);
        return ['status' => 'success', 'message' => 'Kota berhasil dihapus'];
    }

}
