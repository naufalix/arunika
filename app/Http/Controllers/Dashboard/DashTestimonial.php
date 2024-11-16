<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Intervention\Image\Image;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class DashTestimonial extends Controller
{
    
    public function index(){
        return view('dashboard.testimonial',[
            "testimonials" => Testimonial::all(),
            "title" => "Dashboard | Testimoni",
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
    }

    public function store(Request $request){
        
        $validatedData = $request->validate([
            'name' =>'required',
            'image' =>'required|image|file|max:1024',
            'review' => 'required',
            'position' =>'required',
        ]);
        
        //Read image
        $manager = new ImageManager(new Driver());
        $image = $manager->read($request->file('image'));
        
        //Resize image
        $maxwidth = 500;
        $maxheight = 500;
        if ($image->width() > $image->height()) {
            $newheight = $image->height() / ($image->width() / $maxwidth);
            $image->resize($maxwidth, $newheight);
        } else {
            $newwidth = $image->width() / ($image->height() / $maxheight);
            $image->resize($newwidth, $maxheight);
        }

        //Convert to .webp
        $imageWebp = $image->toWebp(100);
        
        //Upload new image
        $validatedData['image'] = time().".webp";
        $imageWebp->save('assets/img/testimonials/'.$validatedData['image']);

        //Create new testimonial
        Testimonial::create($validatedData);
        return ['status'=>'success','message'=>'Testimoni berhasil ditambahkan'];
        
    }

    public function update(Request $request){
        $validatedData = $request->validate([
            'id' => 'required|numeric',
            'name' => 'required',
            'review' => 'required',
            'position' => 'required',
            'image' => 'image|file|max:1024',
        ]);
        
        $testimonial = Testimonial::find($request->id);

        //Check if testimonial is found
        if(!$testimonial){
            return ['status'=>'error','message'=>'Testimonial tidak ditemukan'];
        }

        //Check if has image
        if(!$request->file('image')){
            $testimonial->update($validatedData);
            return ['status'=>'success','message'=>'Testimonial berhasil diupdate'];    
        }

        //Delete old image
        $img_path = public_path().'/assets/img/testimonials/'.$testimonial->image;
        if(file_exists($img_path)){unlink($img_path);}        
        
        //Read image
        $manager = new ImageManager(new Driver());
        $image = $manager->read($request->file('image'));
        
        //Resize image
        $maxwidth = 500;
        $maxheight = 500;
        if ($image->width() > $image->height()) {
            $newheight = $image->height() / ($image->width() / $maxwidth);
            $image->resize($maxwidth, $newheight);
        } else {
            $newwidth = $image->width() / ($image->height() / $maxheight);
            $image->resize($newwidth, $maxheight);
        }

        //Convert to .webp
        $imageWebp = $image->toWebp(100);
        
        //Upload new image
        $validatedData['image'] = time().".webp";
        $imageWebp->save('assets/img/testimonials/'.$validatedData['image']);
        
        //Update tdata
        $testimonial->update($validatedData);
        return ['status'=>'success','message'=>'Testimonial berhasil diupdate'];
    }

    public function destroy(Request $request){
        
        $validatedData = $request->validate([
            'id'=>'required|numeric',
        ]);

        $testimonial = Testimonial::find($request->id);
        $name = $testimonial->name;

        //Check if the data is found
        if(!$testimonial){
            return ['status'=>'error','message'=>'Testimoni tidak ditemukan'];   
        }
        
        //Check if the image is found
        if($testimonial->image){
            // Delete image
            $img_path = public_path().'/assets/img/testimonials/'.$testimonial->image;
            if(file_exists($img_path)){unlink($img_path);}
        }

        // Delete testimonial
        Testimonial::destroy($request->id);    // Delete testimonial
        return ['status'=>'success','message'=>'Testimoni dari '.$name.' berhasil dihapus'];
    }
}
