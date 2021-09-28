<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\SubCategory;
use App\Model\GalleryImage;
use App\Sliders;

use App\Brand;
use App\Attributes;
use App\AttributesValue;
use App\ProductAtributes;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

use Image; 

class SliderController extends Controller
{
    public function index()
    {

        $sliders = Sliders::latest('id')->get();
        return view('backend.sliders.index', ['sliders' => $sliders]);
    }

    public function create()
    {
       



        return view('backend.sliders.create');

    }

    
    public function store(Request $request)
    {
        $insert = new Sliders();

        if ($request->file('image')) {
            $imagePath = $request->file('image');
            $imageName = $imagePath->getClientOriginalName();
           

            $img = Image::make($request->file('image')->getRealPath());
        $img->resize(580, 459, function ($constraint) {
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
  
       
    
            $insert->title = $request->input('title');

            $insert->text1 = $request->input('text1');

            $insert->text2 = $request->input('text2');
            $insert->text3 = $request->input('text3');

            $insert->text4 = $request->input('text4');
            $insert->button_text = $request->input('btn_text');

            $insert->link = $request->input('btn_link');
            $insert->save();

            $request->session()->flash('success', 'Successfully Created!');
        return redirect(route('backend.slider.create'));

    }
    public function edit($id)
    {
        $slider = Sliders::find($id);

        
        return view('backend.sliders.edit', ['slider' => $slider]);

    }

    public function update(Request $request, $id)
    {
        $insert = Sliders::find($id);



        if ($request->file('image')) {
            $imagePath = $request->file('image');
            $imageName = $imagePath->getClientOriginalName();
           

            $img = Image::make($request->file('image')->getRealPath());
        $img->resize(580, 459, function ($constraint) {
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
  
       
    
            $insert->title = $request->input('title');

            $insert->text1 = $request->input('text1');

            $insert->text2 = $request->input('text2');
            $insert->text3 = $request->input('text3');

            $insert->text4 = $request->input('text4');
            $insert->button_text = $request->input('btn_text');

            $insert->link = $request->input('btn_link');
            $insert->save();

            $request->session()->flash('success', 'Successfully Updated!');
        return redirect(route('backend.slider.index'));
    }    
       


    public function destroy($id)
    {
        Sliders::find($id)->delete();
        return redirect(route('backend.slider.index'))->withError('Successfully Deleted!');
    }
}
