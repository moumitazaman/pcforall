@extends('frontend.layouts.app-page')

@section('title', 'PC Builder')

@section('content')

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<link rel="stylesheet" href="{{ asset('backend/plugins/sweetalert2/sweetalert2.min.css') }}">
<script src="{{ asset('frontend/js/jquery-3.3.1.min.js') }}"></script>

    


    <div class="container" style="margin-top: 20px">
    <?php 
		$settings=App\Settings::where('id',1)->first();


				?>
        
        @if(session()->has('success_msg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session()->get('success_msg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif
        @if(session()->has('alert_msg'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session()->get('alert_msg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif
        @if(count($errors) > 0)
            @foreach($errors0>all() as $error)
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ $error }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endforeach
        @endif
        <div class="row justify-content-center">
            <div class="col-lg-7">
<form>
            <div class="row">
 

                      <label style="padding-left:20px;"><strong>Select Brand</strong></label><br>

                      <input type="radio"  class="btn-check brand" name="brand" id="btn-check-20" value="intel"  /><label  style="margin-left:5px; margin-right:15px; margin-bottom:20px;" class="btn btn-primary" for="btn-check-20">Intel</label>
                      <input type="radio"  class="btn-check brand" id="btn-check-30" name="brand" value="amd" /><label  class="btn btn-primary" for="btn-check-30">AMD</label>

                    </div>
                    <label style="padding:5px;"><strong>Components</strong></label><br>

<?php $i=0;?>
                    @foreach($subcategories as $sub)
                    <?php $i++;?>
                    <input type="radio" class="btn-check marchio" name="subs" id="btn-check-{{$i}}" value="{{$sub->id}}" /><label  class="btn btn-primary" for="btn-check-{{$i}}">{{$sub->sub_category_name}}</label>


                    @endforeach



</form>


                <br>
                @if(\Cart::getTotalQuantity()>0)
                    <h4><span id="qtyold">{{ \Cart::getTotalQuantity()}}</span><span id="qty"></span> Product(s) In Your List</h4><br>
                @else
                    <h4>No Product(s) In Your List</h4><br>
                    <a href="{{url('/')}}" class="btn btn-dark">Continue Shopping</a>
                @endif
                <?php $count =1;?>
                
                @foreach($cartCollection as $item)
               

                    <div class="row cg{{ $item->id}}" style="padding-left: 30px;">
                        <div class="col-lg-3">
                            <img src="<?php echo asset('/').'uploads/'.$item->associatedModel->img_name; ?>" class="img-thumbnail" width="200" height="200">
                        </div>
                        <div class="col-lg-5 nodesign">
                            <p>
                                <b><a href="{{url('/')}}">{{ $item->name }}</a></b><br>
                                <b>Price: </b>{{$settings->currency}}<input type="text" value="{{ $item->price}}" class="price" name="price" disabled>
<br>
                                <b>Sub Total: </b>{{$settings->currency}}<input type="text" value="{{ \Cart::get($item->id)->getPriceSum() }}" class="subtotal<?php echo $count;?>" disabled><br>
                                {{--                                <b>With Discount: </b>${{ \Cart::get($item->id)->getPriceSumWithConditions() }}--}}
                            </p>
                        </div>
                        <div class="col-lg-4">
                            <div class="row">
                            <?php 
                            $products = App\Product::where('id',$item->id)->first();
                            $prototal=$products->quantity;
                            
                            
                            ?>
                                <form action="{{ route('cart.update') }}" class="sendupdate<?php echo $count;?>" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-group row">

                                        
                                                  <input type="hidden" class="rowId<?php echo $count;?>" value="{{$item->rowId}}"/>
                                                  <input type="hidden" value="{{ $prototal}}" class="prototal<?php echo $count;?>" name="prototal" disabled>

        <input type="hidden" name="proId" class="proId<?php echo $count;?>" value="{{$item->id}}"/>
        <input type="hidden" value="{{ $item->price}}" class="price<?php echo $count;?>" name="price" disabled>
       <div class="input-group">

                                        <button type="button"  class="d-icon-minus btn btn-secondary decrement-btn<?php echo $count;?>"  style="margin-right: 15px;"></button>
                                        <input type="text" size="2" value="{{$item->quantity}}" name="qty" class="qty<?php echo $count;?>"
               autocomplete="off"   MIN="1" MAX="30">
                

                                        <button type="button"  data-quantity="{{$item->quantity}}"  class="d-icon-plus btn btn-secondary increment-btn<?php echo $count;?>"></button>
</div>
                                    </div>
                                </form>
                                <form class="sendid">
                                    {{ csrf_field() }}
                                    <input type="hidden" value="{{ $item->id }}" class="did" name="did">
                                            <input type="hidden" size="2" value="{{$item->quantity}}" name="qty" class="qty<?php echo $count;?>">

                                    <button type="button" data-id="{{$item->id}}"  class="remove-item<?php echo $count;?> pointer btn-danger btn-sm" style="margin-right: 10px;"><i class="fa fa-times"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <?php $count++;?>

                @endforeach

                @if(count($cartCollection)>0)
                <div class="col-lg-5">
                    <div class="card">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><b>Total: </b><span id="totalold">{{$settings->currency}}{{ \Cart::getTotal() }}</span><span id="total"></span></li>

                        </ul>
                    </div>
                    <br><a href="{{ url('/') }}" class="btn btn-dark">Continue Shopping                         <span id="prototal"></span>
</a>
                    <a href="{{ route('checkout.index') }}" class="btn btn-success">Confirm</a>
                </div>
            @endif
               
            </div>
           

            <div class="col-lg-5">
            <div><h3>Products</h3></div>
            <table class="table table-bordered table-sm">
       <thead>
        <tr>
            <th>No</th>
            <th>Product Name</th>
            <th></th>
            <th>Price</th>
		    <th></th>
            <th width="280px">Action</th>
        </tr>
       </thead>
       <tbody id="bodyData">

       </tbody>  
    </table>
            
						
                                          
</div>
        </div>
        <br><br>
    </div>
    <script src="{{ asset('backend/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

    <script>

        $('.marchio').on('click', function () {
    var marchi = {};
    var bodyData = '';

    var b1=$('#btn-check-20:checked').val();
    var b2=$('#btn-check-30:checked').val();

if(b1){
var brand="intel";
}
else if(b2){
    var brand="amd"

}
    $('.marchio:checked').each(function () {
        marchi[$(this).attr('name')] = $(this).val();
    });

    $.ajax({
        headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},  
        url: '{{route('get.pc')}}',
                  type: "POST",
                  dataType: 'json',//this will expect a json response

        // This is the important part!
        data: {marchi: marchi,brand:brand},
        success: function(data){
            $('#bodyData').html(data);

                var i=1;
            $.each(data, function(index, item) {
                var count=item.length;
                console.log(count);
                for(var j=0;j<count;j++){
               bodyData+='<tr>'
                    bodyData+='<td>'+ i++ +'</td><td>'+item[j].product_name+'</td><td></td><td>'+item[j].price+"</td>"
                    +'<td></td>' 
                   /* +'<form class="sendform">'
                                        +'{{ csrf_field() }}'
                                        +'<input type="hidden" value="'+item[0].id+'" class="id'+i+'" name="pid">'
                                        +'<input type="hidden" value="'+ item[0].product_name +'" class="name'+i+'" name="name">'
                                        +'<input type="hidden" value="'+ item[0].price +'" class="price'+i+'" name="price">'
                                        +'<input type="hidden" value="' +item[0].img_name +'" class="img '+i+'" name="img">'
                                        +'<input type="hidden" value="1" class="quantity'+i+'" name="quantity">'
                                      */
                    +'<td>	<button type="button" data-id="'+item[j].id+'" data-name="'+ item[j].product_name +'" data-price="'+ item[j].price +'" data-quantity="1"   class="user_dialog pointer btn btn-secondary btn-sm  active" class="tooltip-test" title="add to cart">'
                                                  + ' <i class="fa fa-shopping-cart"></i>Add'
												+'</button></td>';
                                                
                    bodyData+='</tr>';
                }
        });
        $("#bodyData").append(bodyData);    

            },
        error:function(error){
	 console.log(error)
	 alert("Please Select Brand");
   },

    })
});

$(document).on("click", ".user_dialog", function () {


    var pid = $(this).data('id');
	 var name=$(this).data('name');
     var price = $(this).data('price');
     var quantity=$(this).data('quantity');


var j=0;
$.ajax({
	 headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},  
   type:"POST",
   url: "{{route('cart.add')}}",
   data:{pid:pid,name:name,price:price,quantity:quantity},
   success:function(data){

	Swal.fire({
        text: 'Product Added',
		type: 'success',
		timer: 2000,
		showCancelButton: false,
  showConfirmButton: false
        
      })
	  
		$('#cart_value').text(data.cartCount);
		$('#cartcount').hide(200);
		$('#cart_value').show(300);


        window.location.reload();

   },
   error:function(error){
	 console.log(error)
	 alert("not send");
   },

   
 });
 event.preventDefault();


});




<?php for($i=1;$i<20;$i++){?>
    $( ".increment-btn<?php echo $i;?>" ).click(function() {
        var prototal=$('.prototal<?php echo $i;?>').val()-1;
        $('.prototal<?php echo $i;?>').val(prototal);

if(prototal == 1){
    Swal.fire({
        text: 'Product Out of Stock',
		type: 'error',
		timer: 3000,
		showCancelButton: false,
  showConfirmButton: false
        
      })

}
else{

        var $counter = $('.qty<?php echo $i;?>');
    $counter.val( parseInt($counter.val()) + 1 );
    var num=$('.qty<?php echo $i;?>').val();
    var price= $('.price<?php echo $i;?>').val();
    var subtotal=price*num;
    $('.subtotal<?php echo $i;?>').val(subtotal);

    $.ajax({
	 headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},  
   type:"POST",
   url: "{{route('cart.update')}}",
   data:$('.sendupdate<?php echo $i;?>').serializeArray(),

   success:function(data){

    $('#totalold').hide(300);
    $('#qtyold').hide(200);

    $('#qty').text(data.no);

    $('#total').text(data.total);

	

	  
   },
   error:function(error){
	 console.log(error)
	 alert("not send");
   },

   
 });
 
}

    });


    $( ".decrement-btn<?php echo $i;?>" ).click(function() {
        var $counter = $('.qty<?php echo $i;?>');
        if($counter.val()>1){
            $counter.val( parseInt($counter.val()) - 1 );
            var num=$('.qty<?php echo $i;?>').val();
    var price= $('.price<?php echo $i;?>').val();
    var subtotal=price*num;
    $('.subtotal<?php echo $i;?>').val(subtotal);
    
    $.ajax({
	 headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},  
   type:"POST",
   url: "{{route('cart.update')}}",
   data:$('.sendupdate<?php echo $i;?>').serializeArray(),

   success:function(data){
    $('#totalold').hide(300);
    $('#qtyold').hide(200);

    $('#qty').text(data.no);

    $('#total').text(data.total);
  
	

	  
   },
   error:function(error){
	 console.log(error)
	 alert("not send");
   },

   
 });

        }
        else if($counter.val()==0) {
            $counter.val()=1;

        }
        else{
            $counter.val( parseInt($counter.val()));

        }
    });



    $( ".remove-item<?php echo $i;?>" ).click(function() {

        var id = $(this).data("id");
        var quant = $('.qty<?php echo $i;?>').val();

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Remove it!'
      }).then((result) => {
        if (result.value) {
            $.ajax({
                        headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },  
                      type:"POST",
                      url: "{{ route('cart.remove')}}",
                      data:{id:id,quant:quant},
                      success:function(data){
                        $('.cg'+id).hide(200);
                        $('#qtyold').hide(200);
                        $('#totalold').hide(200);


                        $('#qty').show(300);
                        $('#total').show(300);


                        $('#qty').text(data.qty);
                        $('#total').text(data.total);

                        window.location.reload();


                      }


                      
                      
                    });
                    
        }

      });

    });
    


<?php }?>


    </script>

    <style>
   .nodesign input{
        border:none;
        box-shadow:none;
        text-shadow:none;
        background:none !important;
    }
    .nam1,.price1,.button1{
        padding:10px;
    }
    input[type="radio"],input[type="radio"] ~ label::before{
       display:none;
    }
    input[type="radio"]:checked + label {
    background-color:#bfb;
    border-color: #4c4;
    color:#4FA584;
}
input[type="radio"]:checked{
    visibility:hidden;
}

.btn{
    padding:5px !important;
}
    </style>
@endsection


@section('scripts')

@endsection