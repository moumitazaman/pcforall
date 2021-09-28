@extends('backend.layouts.app')

@section('title', 'Configure')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          {{-- Messages will display here --}}
          @include('backend.layouts.flash')
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Configure Form</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Configure</li>
                <li class="breadcrumb-item active">Configure Form</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="card card-default">
            <!-- form -->
            <form action="{{ route('backend.pcbuilder.update',$pcs->id) }}" id="sales_info" method="POST" enctype="multipart/form-data">
              @csrf
                @method('PUT')            


              <div class="card-header">
                <h3 class="card-title">Configure</h3>

                <!-- <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                      class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                      class="fas fa-remove"></i></button>
                </div> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8 offset-md-2">
                    <div class="row">
                      <div class="col-md-6"> 
                      <div class="form-group">
                      <label for="email">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Title" value="{{$pcs->name}}">
                        
</div>
                        
                        <div class="form-group">
                        <label class="control-label" for="date">Brand</label>

                        <select required name="brand" id="brand" class="form-control">
                          <option value="">--Select Brand--</option>
                          <option value="intel" <?php if($pcs->brand=="intel"){ echo "selected";}?>>Intel</option>
                          <option value="amd" <?php if($pcs->brand=="amd"){ echo "selected";}?>>AMD</option>

</select>
                      </div>
                      <div class="form-group">

<label for="name">Product</label>
<select  name="product" id="product" class="form-control">
        <option>Select an option</option>
       @foreach($products as $pros)
       <option value="{{$pros->id}}" <?php if($pcs->product==$pros->id){ echo "selected";}?>>{{$pros->product_name}}</option>
@endforeach
      </select>
</div>
        
<!--<div class="form-group">

<label for="name">Power Supply</label>
    <div class="multiselect">
<div class="selectBox" onclick="showCheckboxes1()">
<select>
<option>Select an option</option>
</select>
<div class="overSelect"></div>
</div>
<div id="checkboxes1">
@foreach($powers as $pow)
<label for="one">
<input type="checkbox"  name="power[]"  value="{{$pow->id}}">{{$pow->product_name}}


</label>
@endforeach
</div>
</div>

</div>

<div class="form-group">

<label for="name">Monitor</label>
    <div class="multiselect">
<div class="selectBox" onclick="showCheckboxes3()">
<select>
<option>Select an option</option>
</select>
<div class="overSelect"></div>
</div>
<div id="checkboxes3">
@foreach($monitors as $monitor)
<label for="one">
<input type="checkbox"  name="monitor[]"  value="{{$monitor->id}}">{{$monitor->product_name}}


</label>
@endforeach
</div>
</div>

</div>
                      
                      </div>
                     
                     
                      <div class="col-md-6">
                      <div class="form-group">

<label for="name">Keyboard</label>
    <div class="multiselect">
<div class="selectBox" onclick="showCheckboxes4()">
<select>
<option>Select an option</option>
</select>
<div class="overSelect"></div>
</div>
<div id="checkboxes4">
@foreach($keyboards as $keys)
<label for="one">
<input type="checkbox"  name="keyboard[]"  value="{{$keys->id}}">{{$keys->product_name}}


</label>
@endforeach
</div>
</div>

</div> 

<div class="form-group">

<label for="name">Mouse</label>
    <div class="multiselect">
<div class="selectBox" onclick="showCheckboxes5()">
<select>
<option>Select an option</option>
</select>
<div class="overSelect"></div>
</div>
<div id="checkboxes5">
@foreach($mouses as $mou)
<label for="one">
<input type="checkbox"  name="mouse[]"  value="{{$mou->id}}">{{$mou->product_name}}


</label>
@endforeach
</div>
</div>

</div>
                        <div class="form-group">
                        <label for="name">CPU Cooler</label>
                          <div class="multiselect">
    <div class="selectBox" onclick="showCheckboxes6()">
      <select>
        <option>Select an option</option>
      </select>
      <div class="overSelect"></div>
    </div>
    <div id="checkboxes6">
      @foreach($coolers as $cooler)
      <label for="one">
        <input type="checkbox"  name="cooler[]"  value="{{$cooler->id}}">{{$cooler->product_name}}


      </label>
     @endforeach
    </div>
  </div>

</div>
           
                      
                        <div class="form-group">
                          <label for="phone_number">Motherboard</label>
                          <div class="multiselect">
    <div class="selectBox" onclick="showCheckboxes7()">
      <select>
        <option>Select an option</option>
      </select>
      <div class="overSelect"></div>
    </div>
    <div id="checkboxes7">
      @foreach($motherboards as $mother)
      <label for="one">
        <input type="checkbox"  name="motherboard[]"  value="{{$mother->id}}">{{$mother->product_name}}


      </label>
     @endforeach
    </div>
  </div>

</div>-->
                       
       
                       
                      </div>
                      
                      <div class="col-md-6"> 
                      <div class="form-group">

<label for="name">Processor</label>
    <div class="multiselect">
<div class="selectBox" onclick="showCheckboxes()">
<select>
<option>Select an option</option>
</select>
<div class="overSelect"></div>
</div>
<div id="checkboxes">
@foreach($cpus as $cpu)
<label for="one">
<input type="checkbox"  name="cpu[]"  value="{{$cpu->id}}">{{$cpu->product_name}}


</label>
@endforeach
</div>
</div>

</div>
                      <div class="form-group">
                          <label for="password">RAM </label>
                          <div class="multiselect">
    <div class="selectBox" onclick="showCheckboxes8()">
      <select>
        <option>Select an option</option>
      </select>
      <div class="overSelect"></div>
    </div>
    <div id="checkboxes8">
      @foreach($memories as $mem)
      <label for="one">
        <input type="checkbox"  name="memory[]"  value="{{$mem->id}}">{{$mem->product_name}}


      </label>
     @endforeach
    </div>
  </div>

</div>
<div class="form-group">
                          <label for="password">Monitor</label>
                          <div class="multiselect">
    <div class="selectBox" onclick="showCheckboxes9()">
      <select>
        <option>Select an option</option>
      </select>
      <div class="overSelect"></div>
    </div>
    <div id="checkboxes9">
      @foreach($monitors as $hdd)
      <label for="one">
        <input type="checkbox"  name="monitor[]"  value="{{$hdd->id}}">{{$hdd->product_name}}


      </label>
     @endforeach
    </div>
  </div>

</div>
<div class="form-group">
                          <label for="password">Disk</label>
                        <div class="multiselect">
    <div class="selectBox" onclick="showCheckboxes10()">
      <select>
        <option>Select an option</option>
      </select>
      <div class="overSelect"></div>
    </div>
    <div id="checkboxes10">
      @foreach($ssds as $ssd)
      <label for="one">
        <input type="checkbox"  name="ssd[]"  value="{{$ssd->id}}">{{$ssd->product_name}}


      </label>
     @endforeach
    </div>
  </div>

</div>

                        </div>
                        
                      
                      <div class="col-md-6"> 
                     <!-- <div class="form-group">

                      <label for="name">Graphics</label>
                          <div class="multiselect">
    <div class="selectBox" onclick="showCheckboxes11()">
      <select>
        <option>Select an option</option>
      </select>
      <div class="overSelect"></div>
    </div>
    <div id="checkboxes11">
      @foreach($graphics as $graphic)
      <label for="one">
        <input type="checkbox"  name="graphics[]"  value="{{$graphic->id}}">{{$graphic->product_name}}


      </label>
     @endforeach
    </div>
  </div>

</div>
                        
<div class="form-group">

<label for="name">Casing</label>
    <div class="multiselect">
<div class="selectBox" onclick="showCheckboxes12()">
<select>
<option>Select an option</option>
</select>
<div class="overSelect"></div>
</div>
<div id="checkboxes12">
@foreach($casings as $casing)
<label for="one">
<input type="checkbox"  name="casing[]"  value="{{$casing->id}}">{{$casing->product_name}}


</label>
@endforeach
</div>
</div>

</div>      -->   
                      
                      
                    
                   </div>
                      
                    <div class="row">
                      <div class="col-md-12" style="text-align:center">
                        <button type="submit" class="btn btn-md btn-success"><i class="fas fa-save"></i> Save</button>
                        <a href="{{ route('backend.pcbuilder.create') }}" class="btn btn-md btn-warning"><i class="fas fa-plus"></i> New Configuration</a>
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
  <style>

    
.multiselect {
  width: 200px;
}

.selectBox {
  position: relative;
}

.selectBox select {
  width: 100%;
  font-weight: bold;
}

.overSelect {
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
}

#checkboxes {
  display: none;
  border: 1px #dadada solid;
}

#checkboxes label {
  display: block;
}

#checkboxes label:hover {
  background-color: #1e90ff;
}
#checkboxes1 {
  display: none;
  border: 1px #dadada solid;
}

#checkboxes1 label {
  display: block;
}

#checkboxes1 label:hover {
  background-color: #1e90ff;
}
#checkboxes2 {
  display: none;
  border: 1px #dadada solid;
}

#checkboxes2 label {
  display: block;
}

#checkboxes2 label:hover {
  background-color: #1e90ff;
}
#checkboxes3 {
  display: none;
  border: 1px #dadada solid;
}

#checkboxes3 label {
  display: block;
}

#checkboxes3 label:hover {
  background-color: #1e90ff;
}
#checkboxes4 {
  display: none;
  border: 1px #dadada solid;
}

#checkboxes4 label {
  display: block;
}

#checkboxes4 label:hover {
  background-color: #1e90ff;
}

#checkboxes5 {
  display: none;
  border: 1px #dadada solid;
}

#checkboxes5 label {
  display: block;
}

#checkboxes5 label:hover {
  background-color: #1e90ff;
}
#checkboxes6 {
  display: none;
  border: 1px #dadada solid;
}

#checkboxes6 label {
  display: block;
}

#checkboxes6 label:hover {
  background-color: #1e90ff;
}
#checkboxes7 {
  display: none;
  border: 1px #dadada solid;
}

#checkboxes7 label {
  display: block;
}

#checkboxes7 label:hover {
  background-color: #1e90ff;
}
#checkboxes8 {
  display: none;
  border: 1px #dadada solid;
}

#checkboxes8 label {
  display: block;
}

#checkboxes8 label:hover {
  background-color: #1e90ff;
}
#checkboxes9 {
  display: none;
  border: 1px #dadada solid;
}

#checkboxes9 label {
  display: block;
}

#checkboxes9 label:hover {
  background-color: #1e90ff;
}
#checkboxes10 {
  display: none;
  border: 1px #dadada solid;
}

#checkboxes10 label {
  display: block;
}

#checkboxes10 label:hover {
  background-color: #1e90ff;
}

#checkboxes11 {
  display: none;
  border: 1px #dadada solid;
}

#checkboxes11 label {
  display: block;
}

#checkboxes11 label:hover {
  background-color: #1e90ff;
}
#checkboxes12 {
  display: none;
  border: 1px #dadada solid;
}

#checkboxes12 label {
  display: block;
}

#checkboxes12 label:hover {
  background-color: #1e90ff;
}
  </style>  
  
@endsection
@push('scripts')
<script src="{{ asset('frontend/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{asset('backend/plugins/select2/js/select2.full.min.js')}}"></script>
  <script src="{{asset('backend/plugins/moment/moment.min.js')}}"></script>

  <script src="{{asset('backend/plugins/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>
    <script>
      var expanded = false;

function showCheckboxes() {
  var checkboxes = document.getElementById("checkboxes");
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
}

function showCheckboxes1() {
  var checkboxes1 = document.getElementById("checkboxes1");
  if (!expanded) {
    checkboxes1.style.display = "block";
    expanded = true;
  } else {
    checkboxes1.style.display = "none";
    expanded = false;
  }
}
function showCheckboxes2() {
  var checkboxes = document.getElementById("checkboxes2");
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
} 
function showCheckboxes3() {
  var checkboxes = document.getElementById("checkboxes3");
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
}
function showCheckboxes4() {
  var checkboxes = document.getElementById("checkboxes4");
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
}
function showCheckboxes5() {
  var checkboxes = document.getElementById("checkboxes5");
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
}
function showCheckboxes6() {
  var checkboxes = document.getElementById("checkboxes6");
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
}

function showCheckboxes7() {
  var checkboxes = document.getElementById("checkboxes7");
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
}
function showCheckboxes8() {
  var checkboxes = document.getElementById("checkboxes8");
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
}

function showCheckboxes9() {
  var checkboxes = document.getElementById("checkboxes9");
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
}
function showCheckboxes10() {
  var checkboxes = document.getElementById("checkboxes10");
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
}
function showCheckboxes11() {
  var checkboxes = document.getElementById("checkboxes11");
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
}
function showCheckboxes12() {
  var checkboxes = document.getElementById("checkboxes12");
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
}
function showCheckboxes13() {
  var checkboxes = document.getElementById("checkboxes13");
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
}






          $("#project").on('change', function () {
        var id = $("#project").val();
        var quantity = $("#quantity").val();

        $.ajax({
                  url: '{{url('admin/product')}}'+'/'+id,
                  type: "Get",
                  dataType: 'json',//this will expect a json response
                  //data:{id:$("#customer_id").val()}, 
                   success: function(response){ 
                        $("#srate").val(response[0].sales_rate); 
                 
            }
                
        });

    });

    $("#quantity").on('input', function () {
        var quantity = $("#quantity").val();
        var srate = $("#srate").val();
var amount=quantity*srate;
$("#amount").val(amount);


    });
    </script>
   
    @endpush