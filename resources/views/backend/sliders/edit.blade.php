@extends('backend.layouts.app')

@section('title', 'Create Slider')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark">Slider Form</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Slider</li>
                  <li class="breadcrumb-item active">Slider Form</li>
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
              <form action="{{ route('backend.slider.update',$slider->id) }}" id="sales_info" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="card-header">
                  <h3 class="card-title">Edit Slider</h3> 
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                

                  
                    <div class="col-md-6">
                      
                      <div class="form-group">
                        <label for="email">Title</label>
                        <input type="text" class="form-control" name="title"  value="{{$slider->title}}" required>
                        
                      </div>
                      <div class="form-group">
                          <label for="name">Text 1</label>
                          <input type="text" class="form-control" name="text1"  required value="{{ $slider->text1}}">
                          
                        </div>
                        <div class="form-group">
                          <label for="name">Text 2</label>
                          <input type="text" class="form-control" name="text2" required value="{{$slider->text2}}">
                         
                        </div>
                        <div class="form-group">
                          <label for="name">Text 3</label>
                          <input type="text" class="form-control" name="text3" value="{{ $slider->text3 }}">

                        </div>
                        
                     </div>
                     
                      
                      

                      <div class="col-md-6"> 
               
                        <div class="form-group">
                        <label for="name">Text 4</label>

                        <input type="text" class="form-control" name="text4" value="{{ $slider->text4 }}">

                      </div>
                      <div class="form-group">
                        <label for="name">Button Text</label>

                        <input type="text" class="form-control" name="btn_text" value="{{ $slider->button_text }}">

                      </div>
                      <div class="form-group">
                        <label for="name">Button Link</label>

                        <input type="text" class="form-control" name="btn_link" value="{{$slider->link }}">

                      </div>

                      <div class="form-group">
                          <label for="name">Upload Image</label>
                          <input type="file" name="image" class="form-control" id="imgInp">
                          <img id="blah" width="250px" src="<?php echo asset('/').'uploads/'.$slider->img_name;?>" alt="your image" />
                        </div>

                       
                    
 

  
    
   










                        
                    
                     

                        
                      </div>
                      
  
                      <div class="row" style="text-align:center; width:100%;">
                        <div class="col-md-12">
                          <button type="submit" class="btn btn-md btn-success"><i class="fas fa-save"></i> Save</button>
                          <a href="{{ route('backend.slider.create') }}" class="btn btn-md btn-warning"><i class="fas fa-plus"></i> New Slider</a>
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
      if(img.width >= 500 || img.height >= 400){
        alert(`Nice, image is the right size. It can be uploaded`)
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
      </script>
      
@endsection