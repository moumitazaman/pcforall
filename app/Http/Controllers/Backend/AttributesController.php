<?php

namespace App\Http\Controllers\Backend;
use App\Attributes;
use App\Category;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;


class AttributesController extends Controller
{
    public function index()
    {
        $attributes = Attributes::latest()->get();
        
        return view('backend.attributes.index', ['attributes' => $attributes]);
    }

    public function create()
    {
        $categories = Category::latest()->get();
        return view('backend.attributes.create', ['categories' => $categories]);
    }
    


    public function store(Request $request)
    {
        
        
        $attributes = new Attributes();
        $attributes->name = request('name');
        $attributes->code = request('code');
        $attributes->device = strtolower(request('device'));


        $attributes->status = 1;



        $attributes->save();

        $request->session()->flash('success', 'Successfully Created!');
        return redirect(route('backend.attributes.create'));
    }






}
