@extends('backend.layouts.app')

@section('title', 'Update Product')

@section('content')
<script type="text/javascript" src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js" /></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.min.css"/>

<style>
    #image-list{
        list-style-type: none;
        display:inline-flex;
    }
    #image-list li{
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
                <h1 class="m-0 text-dark">Product Update Form</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Product</li>
                  <li class="breadcrumb-item active">Product Update Form</li>
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
              <form action="{{ route('backend.product.update',$product->id) }}" id="sales_info" method="POST" enctype="multipart/form-data">
              @csrf
                @method('PUT')
                <div class="card-header">
                  <h3 class="card-title">Update Product</h3> 
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                

                  
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="email">Product Name</label>
                        <input type="text" class="form-control" name="name" value="{{$product->product_name}}">
                        
                      </div>
                       <div class="form-group">
                        <label for="email">Title</label>
                        <input type="text" class="form-control" name="title" value="{{$product->title}}">
                        
                      </div>
                      <div class="form-group">
                          <label for="name">Quantity</label>
                          <input type="text" class="form-control" name="quantity"   value="{{$product->quantity}}">
                          
                        </div>
                        <div class="form-group">
                          <label for="name">New Price</label>
                          <input type="text" class="form-control" name="price"  value="{{$product->price}}">
                         
                        </div>
                        <div class="form-group">
                          <label for="name">Old Price</label>
                          <input type="text" class="form-control" name="discount_price"  value="{{$product->discount_price}}">

                        </div>
                            <div class="form-group">
                          <label for="name">Short Description</label>
                          <textarea name="short_details"  class="form-control" placeholder="">{{$product->short_details}}</textarea>

</div>
                        <div class="form-group">
                          <label for="name">Details</label>
                          <textarea name="details"  class="form-control" placeholder="" >{{$product->details}}</textarea>

                        </div>
                        <div class="form-group">
                        <label for="name">Category</label>

                        <select name="category" id="category" class="form-control" >
                          @foreach ($categories as $category)
                          @if(( $category->id)==($product->category_id))
                          <option value="{{ $category->id }}" selected>{{ $category->category_name }}</option>
                          @else
                              <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                              @endif
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="name">SubCategory</label>

                        <select name="subcategory" id="category" class="form-control" >
                          @foreach ($subcategories as $cat)
                          @if(( $cat->id)==($product->category_id))
                          <option value="{{ $cat->id }}" selected>{{ $cat->sub_category_name }}</option>
                          @else
                              <option value="{{ $cat->id }}">{{ $cat->sub_category_name }}</option>
                              @endif
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="name">Brand</label>

                        <select name="brand" id="brand" class="form-control">
                          @foreach ($brands as $brand)
                          @if(( $brand->id)==($product->brand_id))
                          <option value="{{ $brand->id }}" selected>{{ $brand->brand_name }}</option>
                          @else
                              <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                              @endif
                          @endforeach                                
                             
                        </select>
                      </div>

                      <div class="form-group">
                          <label for="name">Upload Image</label>
                          <input type="file" name="image" class="form-control" id="imgInp">
                          <img id="blah" width="250px" src="<?php echo asset('/').'uploads/'.$product->img_name;?>" alt="your image" />
                        </div>
                        <div class="form-group">
                          <label for="name">Upload Gallery Image</label>
                          <input  type="file" class="form-control" name="galleryimages[]" placeholder="Gallery Image" multiple>

                       <input type="hidden" name="gal" value="{{$product->galleryimages}}" />
                        </div>
                        <div class="col-lg-2 col-sm-4 order-lg-1 order-2">
				<ul id="image-list">
				@foreach($galleries as $gal)
        @if(!empty($gal))
        <li  id="image_{{ $gal->id }}" data-order="{{ $gal->order_no }}"><img class="drag_smile img-responsive" width="100" height="100" src="<?php echo asset('/').'uploads/'.$gal->imgname; ?>" alt="">
        <a href="javascript:void(0)" data-id="{{ $gal->id }}" class="delete-confirm" ><i class="fa fa-trash"></i>
     </a>
     </li>
@endif
          
        	@endforeach
					</ul>
				</div>
                      
</div>
                       
        
                      </div>
                       <div class="row" style="text-align:center; width:100%;padding-bottom:5px;">
                        <div class="col-md-12">
                          <button type="button" class="btn btn-md btn-primary" id="submit"><i class="fas fa-save"></i> Reorder</button>
                        </div>
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



     $(document).ready(function () {
       
         var dropIndex;
        $("#image-list").sortable({
            	update: function(event, ui) { 
            		dropIndex = ui.item.index();
            }
        });

        $('#submit').click(function (e) {
           
            var imageIdsArray = [];
            var ordarray = [];
            $('#image-list li').each(function (index) {
            
               // if(index <= dropIndex) {
                    var ordno = $(this).data('order');
                    var id = $(this).attr('id');
                    var split_id = id.split("_");
                    imageIdsArray.push(split_id[1]);
                    ordarray.push(ordno);
                    
               // }

            });
                    

            $.ajax({
                headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}, 
                type:"POST",
                url: "{{url('admin/product/reorder')}}",
                data: {imageIds: imageIdsArray,ordno: ordarray},
                success: function (response) {

                },
error:function(error){
 console.log(error)
 alert("not send");
},
            });
            e.preventDefault();
        });
        
                $('.delete-confirm').click(function (e) {
            var id = $(this).data('id');
              

            $.ajax({
                headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}, 
                type:"POST",
                url: "{{url('admin/product/delete_gallery')}}",
                data: {id: id},
                success: function (response) {
               $("#image-list").load(" #image-list");


                },
error:function(error){
 console.log(error)
 alert("not send");
},
            });
            e.preventDefault();
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


      </script>
      
@endsection