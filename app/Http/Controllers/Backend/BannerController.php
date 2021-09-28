<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Banners;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

use Image; 


class BannerController extends Controller
{
    public function index()
    {

        $banners = Banners::latest()->get();
        return view('backend.banner.index', ['banners' => $banners]);
    }

    public function create()
    {
       



        return view('backend.banner.create');

    }

    
    public function store(Request $request)
    {
        $insert = new Banners();

        if ($request->file('image')) {
            $imagePath = $request->file('image');
            $imageName = $imagePath->getClientOriginalName();
           

            $img = Image::make($request->file('image')->getRealPath());
        $img->resize(346, 261, function ($constraint) {
            $constraint->aspectRatio();
        })->save(public_path('/uploads').'/'. $imageName);
        $path = $request->file('image')->storeAs('uploads', $imageName, 'public');
           $request->image->move(public_path('/uploads/zoom'), $imageName);
            $insert->img_name =$imageName;

  
          }

          $images=array();
          if($files=$request->file('galleryimages')){
              foreach($files as $file){
                  $name=$file->getClientOriginalName();
                  $file->move(public_path('/uploads'), $name);
                  $images[]=$name;
                  $insert->galleryimages =implode(',',$images);

              }

          }
  
       
    

            $insert->text1 = $request->input('text1');

            

            $insert->button_text = $request->input('btn_text');

            $insert->link = $request->input('btn_link');
            $insert->save();

            $request->session()->flash('success', 'Successfully Created!');
        return redirect(route('backend.banner.create'));

    }
    public function edit($id)
    {
        $slider = Banners::find($id);

        
        return view('backend.banner.edit', ['slider' => $slider]);

    }

    public function update(Request $request, $id)
    {
        $insert = Banners::find($id);



        if ($request->file('image')) {
            $imagePath = $request->file('image');
            $imageName = $imagePath->getClientOriginalName();
           

            $img = Image::make($request->file('image')->getRealPath());
        $img->resize(346, 261, function ($constraint) {
            $constraint->aspectRatio();
        })->save(public_path('/uploads').'/'. $imageName);
        $path = $request->file('image')->storeAs('uploads', $imageName, 'public');
           $request->image->move(public_path('/uploads/zoom'), $imageName);
            $insert->img_name =$imageName;

  
          }

          $images=array();
          if($files=$request->file('galleryimages')){
              foreach($files as $file){
                  $name=$file->getClientOriginalName();
                  $file->move(public_path('/uploads'), $name);
                  $images[]=$name;
                  $insert->galleryimages =implode(',',$images);

              }

          }
  
       
    

            $insert->text1 = $request->input('text1');


            $insert->button_text = $request->input('btn_text');

            $insert->link = $request->input('btn_link');
            $insert->save();

            $request->session()->flash('success', 'Successfully Updated!');
        return redirect(route('backend.banner.index'));
    }    
       


    public function destroy($id)
    {
     Banners::find($id)->delete();
        return redirect(route('backend.banner.index'))->withError('Successfully Deleted!');
    }
}
