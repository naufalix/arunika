<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\Cultural;
use App\Models\City;
use Illuminate\Http\Request;
use Intervention\Image\Image;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Maatwebsite\Excel\Facades\Excel;

class DashCultural extends Controller
{

    public function index(){
        return view('dashboard.cultural',[
            "title" => "Dashboard | Agenda Budaya",
            "culturals" => Cultural::orderBy("id","DESC")->get(),
            "cities" => City::orderBy("name","ASC")->get(),
        ]);
    }

    public function postHandler(Request $request){
        //dd($request);
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
            // return back()->with("info","Fitur hapus sementara dinonaktifkan");
        }
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'city_id'=>'required',
            'title'=>'required',
            'date'=>'required',
            'place'=>'required',
            'price'=>'required',
            'image' => 'required|image|file|max:1024',
        ]);

        //Read image
        $manager = new ImageManager(new Driver());
        $image = $manager->read($request->file('image'));
        
        // Resize image
        $maxwidth = 800;
        $maxheight = 450;
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
        $imageWebp->save('assets/img/cultural/'.$validatedData['image']);
        
        Cultural::create($validatedData);
        return ['status'=>'success','message'=>'Agenda Budaya berhasil ditambahkan'];

    }

    public function update(Request $request){
        $validatedData = $request->validate([
            'id'=>'required|numeric',
            'city_id'=>'required',
            'title'=>'required',
            'date'=>'required',
            'place'=>'required',
            'price'=>'required',
            'image' => 'image|file|max:1024',
        ]);
        
        $cultural = Cultural::find($request->id);

        //Check if the Cultural is found
        if(!$cultural){
            return ['status'=>'error','message'=>'Agenda Budaya tidak ditemukan'];
        }
        
        //Check if has image
        if($request->file('image')){

            // Delete old image
            $image_path = public_path().'/assets/img/cultural/'.$cultural->image;
            if (file_exists($image_path)) {
                unlink($image_path); // Delete the image file
            }
            
            //Read image
            $manager = new ImageManager(new Driver());
            $image = $manager->read($request->file('image'));
            
            // Resize image
            $maxwidth = 800;
            $maxheight = 450;
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
            $imageWebp->save('assets/img/cultural/'.$validatedData['image']);
            
            $cultural->update($validatedData);
            return ['status'=>'success','message'=>'Agenda Budaya berhasil diupdate'];
            
        }else{
            // Update data
            $cultural->update($validatedData);    
            return ['status'=>'success','message'=>'Agenda Budaya berhasil diedit'];
        }
        
    }

    public function destroy(Request $request){
        
        $validatedData = $request->validate([
            'id' => 'required|numeric',
        ]);

        $cultural = Cultural::find($request->id);

        // Check if the data is found
        if (!$cultural) {
            return ['status' => 'error', 'message' => 'Agenda Budaya tidak ditemukan'];
        }

        $image_path = public_path().'/assets/img/cultural/'.$cultural->image;

        // Check if the image file exists before attempting to delete it
        if (file_exists($image_path)) {
            unlink($image_path); // Delete the image file
        }

        Cultural::destroy($request->id);
        return ['status' => 'success', 'message' => 'Agenda Budaya berhasil dihapus'];
    }

}
