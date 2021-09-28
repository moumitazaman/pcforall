@extends('backend.layouts.app')

@section('title', 'Create Product')

@section('content')
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script type="text/javascript" src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js" /></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.min.css"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" type="text/css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
  <link rel="stylesheet" href="{{asset('backend/dist/css/image-uploader.min.css')}}">
<script src="{{asset('backend/dist/js/image-uploader.min.js')}}"></script>

<style>
    .gallery{
        list-style-type: none;
        display:inline-flex;
    }
    .gallery li{
        padding:5px;
    }
</style>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark">Product Form</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Product</li>
                  <li class="breadcrumb-item active">Product Form</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
  
        <!-- Main content -->
        <div class="content">
          <div class="container-fluid">
            {{-- Messages will display here --}}
            @include('backend.layouts.flash')
            <div class="card card-default">
              <!-- form -->
              <form action="{{ route('backend.product.store') }}" id="my_form" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-header">
                  <h3 class="card-title">Add Product</h3> 
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                

                  
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="email">Product Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Product Name" value="{{ old('name') }}" required>
                        
                      </div>
                      <div class="form-group">
                        <label for="email">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Product Title" value="{{ old('title') }}" required>
                        
                      </div>
                      <div class="form-group">
                          <label for="name">Quantity</label>
                          <input type="text" class="form-control" name="quantity" placeholder="Example: 45" required value="{{ old('storage_size') }}">
                          
                        </div>
                        <div class="form-group">
                          <label for="name">New Price</label>
                          <input type="text" class="form-control" name="price" required value="{{ old('storage_size') }}">
                         
                        </div>
                        <div class="form-group">
                          <label for="name">Old Price</label>
                          <input type="text" class="form-control" name="discount_price" value="{{ old('storage_size') }}">

                        </div>
                         <div class="form-group">
                          <label for="name">Short Description</label>
                          <textarea name="short_details"  class="form-control" placeholder=""></textarea>

</div>
                        <div class="form-group">
                          <label for="name">Details</label>
                          <textarea name="details"  class="form-control" placeholder=""></textarea>

</div>
                      
                     </div>
                     
                      
                      

                      <div class="col-md-6"> 
               
                        <div class="form-group">
                        <label for="name">Category</label>

                        <select name="category" id="category" class="form-control" required>
                          <option value="">--Select Category--</option>
                          @foreach ($categories as $category)
                              <option value="{{ $category->id }}"
                                
                              >{{ $category->category_name }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="name">SubCategory</label>

                        <select name="subcategory" id="subcategory" class="form-control" required>
                          <option value="">--Select SubCategory--</option>
                          <option value=""></option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="name">Brand</label>

                        <select name="brand" id="brand" class="form-control" required>
                          <option value="">--Select Brand--</option>
                          @foreach ($brands as $brand)
                              <option value="{{ $brand->id }}"
                                
                              >{{ $brand->brand_name }}</option>
                          @endforeach
                        </select>
                      </div>

                      <div class="form-group">
                          <label for="name">Upload Image (Minimum 500*500 px,ratio 1:1)</label>
                          <input type="file" name="image" class="form-control" id="imgInp">
                          <img id="blah" width="250px" src="<?php echo asset('/').'backend/img/preview.png';?>" alt="your image" />
                        </div>

                        <div class="form-group">
                          <label for="name">Upload Gallery Image</label>
                          <input type="hidden" name="order_no[]" id="order_no">
                                          <div class="input-images-1" style="padding-top: .5rem;"></div>

                       
                                                 

                        </div>
                        <div class="form-group">
                        <button type="button" class="btn btn-md btn-info" id="submit"><i class="fas fa-save"></i> Reorder</button>
                    </div>
                     <!-- <label for="name">Attributes</label>
                      <div class="form-group">
                        <label for="device">For Device  
                        <form id=deviceform>
                        {{ csrf_field() }}
                        <select name="device" id="device" class="form-control">
                          <option value="">--Select Option--</option>
                          <option value="all">All</option>

                          <option value="laptop">Laptop</option>

                          <option value="desktop">Desktop</option>
                          <option value="mouse">Mouse</option>
                          <option value="Keyboard">Keyboard</option>





                          
                        </select>
                        </form>
                        
                      </div>-->
                      
                     

                      @foreach ($attrs as $attr)

                      @if($attr->device=='laptop')

                      <div class="laptop">
                      <div class="form-group">

                        <label for="email">{{ $attr->name }}:</label>
                        @if($attr->code=='select')
                       <?php
                       $id=$attr->id;
                        $values= DB::table('attributesvalues')->select('values')->where('attr_id',$id)->where('device','laptop')->get();
                       ?>



                        <select name="attr_select[]" id="code" class="form-control" >
                          <option value="">--Select--</option>
                          @foreach($values as $val)
                          <option value="{{$val->id}}">{{$val->values}}</option>

                          @endforeach
                          </select>
                         

                          @elseif($attr->code=='checkbox')
                       <?php   
                       $id=$attr->id;
                        $values= DB::table('attributesvalues')->where('attr_id',$id)->where('device','laptop')->get();
                       ?>
                                                 @foreach($values as $val)

                          <label for="name">{{$val->values}}</label>

                          <input type="checkbox"  name="attr_check[]"  value="{{$val->id}}">
                          @endforeach

                        
                      

                        
                          
                          @else


                          <textarea name="attr_detail[]"  class="form-control" placeholder="" ></textarea>

                       





                        @endif

                        </div>
                        </div>
                        @endif

          @if($attr->device=='desktop')

<div class="desktop">
<div class="form-group">

  <label for="email">{{ $attr->name }}:</label>
  @if($attr->code=='select')
 <?php
 $id=$attr->id;
  $values= DB::table('attributesvalues')->select('values')->where('attr_id',$id)->where('device','desktop')->get();
 ?>



  <select name="attr_select[]" id="code" class="form-control">
    <option value="">--Select--</option>
    @foreach($values as $val)
    <option value="{{$val->id}}">{{$val->values}}</option>

    @endforeach
    </select>
   

    @elseif($attr->code=='checkbox')
 <?php   
 $id=$attr->id;
  $values= DB::table('attributesvalues')->where('attr_id',$id)->where('device','desktop')->get();
 ?>
                           @foreach($values as $val)

    <label for="name">{{$val->values}}</label>

    <input type="checkbox"  name="attr_check[]"  value="{{$val->id}}">
    @endforeach

  


  
    
    @elseif($attr->code=='textarea')


    <textarea name="attr_detail[]"  class="form-control" placeholder="" ></textarea>

 
@else




  @endif

  </div>
  </div>
  @endif
  @if($attr->device=='mouse')

<div class="mouse">
<div class="form-group">

  <label for="email">{{ $attr->name }}:</label>
  @if($attr->code=='select')
 <?php
 $id=$attr->id;
  $values= DB::table('attributesvalues')->select('values')->where('attr_id',$id)->where('device','mouse')->get();
 ?>



  <select name="attr_select[]" id="code" class="form-control">
    <option value="">--Select--</option>
    @foreach($values as $val)
    <option value="{{$val->id}}">{{$val->values}}</option>

    @endforeach
    </select>
   

    @elseif($attr->code=='checkbox')
 <?php   
 $id=$attr->id;
  $values= DB::table('attributesvalues')->where('attr_id',$id)->where('device','mouse')->get();
 ?>
                           @foreach($values as $val)

    <label for="name">{{$val->values}}</label>

    <input type="checkbox"  name="attr_check[]"  value="{{$val->id}}">
    @endforeach

  


  
    
    @else


    <textarea name="attr_detail[]"  class="form-control" placeholder="" ></textarea>

 





  @endif

  </div>
  </div>
  @endif

  @if($attr->device=='keyboard')

<div class="keyboard">
<div class="form-group">

  <label for="email">{{ $attr->name }}:</label>
  @if($attr->code=='select')
 <?php
 $id=$attr->id;
  $values= DB::table('attributesvalues')->select('values')->where('attr_id',$id)->where('device','keyboard')->get();
 ?>



  <select name="attr_select[]" id="code" class="form-control">
    <option value="">--Select--</option>
    @foreach($values as $val)
    <option value="{{$val->id}}">{{$val->values}}</option>

    @endforeach
    </select>
   

    @elseif($attr->code=='checkbox')
 <?php   
 $id=$attr->id;
  $values= DB::table('attributesvalues')->where('attr_id',$id)->where('device','keyboard')->get();
 ?>
                           @foreach($values as $val)

    <label for="name">{{$val->values}}</label>

    <input type="checkbox"  name="attr_check[]"  value="{{$val->id}}">
    @endforeach

  


  
    
    @else


    <textarea name="attr_detail[]"  class="form-control" placeholder="" ></textarea>

 





  @endif

  </div>
  </div>
  @endif


  @if($attr->device=='all')

<div class="all">
<div class="form-group">

  <label for="email">{{ $attr->name }}:</label>
  @if($attr->code=='select')
 <?php
 $id=$attr->id;
  $values= DB::table('attributesvalues')->select('values')->where('attr_id',$id)->where('device','all')->get();
 ?>



  <select name="attr_select[]" id="code" class="form-control" >
    <option value="">--Select--</option>
    @foreach($values as $val)
    <option value="{{$val->id}}">{{$val->values}}</option>

    @endforeach
    </select>
   

    @elseif($attr->code=='checkbox')
 <?php   
 $id=$attr->id;
  $values= DB::table('attributesvalues')->where('attr_id',$id)->where('device','all')->get();
 ?>
                           @foreach($values as $val)

    <label for="name">{{$val->values}}</label>

    <input type="checkbox"  name="attr_check[]"  value="{{$val->id}}">
    @endforeach

  


  
    
    @else


    <textarea name="attr_detail[]"  class="form-control" placeholder="" ></textarea>

 





  @endif

  </div>
  </div>
  @endif

                        @endforeach










                        
                    
                     

                        
                      </div>
                      
  
                      <div class="row" style="text-align:center; width:100%;">
                        <div class="col-md-12">
                          <button type="submit" class="btn btn-md btn-success"><i class="fas fa-save"></i> Save</button>
                          <a href="{{ route('backend.product.create') }}" class="btn btn-md btn-warning"><i class="fas fa-plus"></i> New Product</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.row -->
                </div>
              </form>
              <!-- /.form -->
            </div>
            <!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <script>
            $(".laptop").hide(200);
            $(".desktop").hide(200);
            $(".mouse").hide(200);
            $(".keyboard").hide(200);
            $(".all").hide(200);

$('.input-images-1').imageUploader();

     $(document).ready(function () {
          var dropIndex;
        $(".uploaded").sortable({
            	update: function(event, ui) { 
            		dropIndex = ui.item.index();
            }
        });
                    $('#submit').click(function (e) {
    

            var imageorder=[];
            $('.uploaded .uploaded-image').each(function (index) {
            
                
                    var id = $(this).data('index');
                    
                    imageorder.push(id);
                 
                
                
                         

            }); 
 $('#order_no').val(imageorder);
                    });
                    
  

        $('#device').on('change', function (e) {
        var selectVal = $("#device option:selected").val();
       if(selectVal=='laptop'){
        $(".laptop").show(300);


       }
       else if(selectVal=='desktop'){
        $(".desktop").show(300);


       }
       else if(selectVal=='mouse'){
        $(".mouse").show(300);


       }
       else if(selectVal=='keyboard'){
        $(".keyboard").show(300);


       }
       else if(selectVal=='all'){
        $(".all").show(300);


       }
       else{

       }




        /*$.ajax({
                        headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },  
                      type:"POST",
                      url: "{{ url('/admin/device')}}",
                      data: {device:selectVal},
                      success:function(response){
						
                        console.log(response);

                        
                      },
                      error:function(error){
                        console.log(error)
                        alert("not send");
                      },
              
                      
                    });*/

});
      });

   
      function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
   let img = new Image()
img.src = window.URL.createObjectURL(event.target.files[0])
    reader.onload = function(e) {
      if(img.width >= 500 || img.height >= 500){
        $('#blah').attr('src', e.target.result);

        } else {
        alert(`Sorry, this image doesn't look like the size we wanted. we require minimum 500 x 500 size image.`);
   }   
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

$("#imgInp").change(function() {
  readURL(this);
});

$('#category').on('change', function(){
    var id = $(this).val();
   /* $.getJSON("getsubcategory/" + id , function(data){
        // Assumed subcategory is id of another select
        alert(response);
        var subcat = $('#subcategory').empty();
        
        $.each(data, function(k, v){
            var option = $('<option/>', {id:k, v});
            subcat.append(option);
        });
    });*/
    $.ajax({
	 headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},  
   type:"GET",
   url: "{{url('admin/product/getsubcategory')}}"+"/"+id,

   success:function(data){

    $('#subcategory').empty();
    $.each(data,function(k,v){
     for(var i=0;i<=data.no;i++)
            $('#subcategory').append('<option value ="'+v[i].id+'">'+v[i].sub_category_name+'</option>');
        });

	  
   },
   error:function(error){
	 console.log(error)
	 alert("not send");
   },
    });
});

$(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;
             var count=0;
           
            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                reader.onload = function(event) {
                    count++;
                  
          
                    var liwrap=  $($.parseHTML('<li>'));
                   var image= $($.parseHTML('<img width="100">')).attr('id',count).attr('src', event.target.result);
       var link=$($.parseHTML('<a href="javascript:void(0)"  class="delete-confirm" ><i class="fa fa-trash"></i>')).attr('data-id',count).attr('id','img'+count);
           link.appendTo(liwrap);
          image.appendTo(placeToInsertImagePreview).wrap(liwrap);
            
          
                }
               reader.readAsDataURL(input.files[i]);
                
            }
            reader.onload=function(event){
                $('.delete-confirm').click(function (e) {
            var id = $(this).data('id');
            $('#img'+id).remove();
           i--;
            const input = document.getElementById('gallery-photo-add');
const fileListArr = Array.from(input.files);
fileListArr.splice(i, 1); 
console.log(fileListArr);
          });
                
            }
        }

    };


    $('#gallery-photo-add').on('change', function() {
        imagesPreview(this, 'div.gallery');
    });
    
    

    
    
    
    
    
    
    
          
});

      
      </script>
     
@endsection