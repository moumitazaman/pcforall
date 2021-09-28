<html>
<head>
    <style>
   
    html {
        width: 100%;
    height: 70%;

}
    body {
        font-family: sans-serif;
        font-size: 10pt;
       /* background-image: url('{{ asset('backend/img/watermark.png')}}');*/
        background-color: #ffffff; /* Used if the image is unavailable */
        background-repeat: no-repeat;
        background-position: 50% 50%; 
        background-size:729px 424px;
      
  
    }
    span::before {
  content: "\A";
  white-space: pre;
}
img{
  margin-top:-120px;
}

.card-header{
  border:none;
}
th{
  background-color:#019644 !important;
  color:#ffffff;
}
    header{

        width:100%;
        height: 154px;
      /*  background-image: url('{{ asset('backend/img/header.png')}}');*/
        background-repeat: no-repeat;
        background-position: center center;
        background-size:940px 154px;
        text-align:center;
        margin: 0 auto;
        padding:0px;
       
    

    }

    footer{

    width:100%;
    height: 84px;
  /*  background-image: url('{{ asset('backend/img/footer.png')}}');*/
    background-repeat: no-repeat;
    background-position: center center;
    background-size:940px 84px;
    background-repeat: no-repeat;
    text-align:center;
    margin: 0 auto;
    padding:0px;
    left: 0px;
    right: 0px;
    margin-top:380px;
    
    


}

    p {
        margin: 0pt;
    }

    table.items {
        border: 0.1mm solid #e7e7e7;
    }

    td {
        vertical-align: top;
    }

    .items td {
        border-left: 0.1mm solid #e7e7e7;
        border-right: 0.1mm solid #e7e7e7;
    }

    table thead td {
        text-align: center;
        border: 0.1mm solid #e7e7e7;
       
    }

    .items td.blanktotal {
        background-color: #EEEEEE;
  
        background-color: #FFFFFF;
       
    }

    .items td.totals {
        text-align: right;
       
    }

    .items td.cost {
        text-align: "."center;
    }
    .items th{
        border:1px solid #000000;
    }
    </style>
    <title>Invoice</title>
</head>

<body>
<header>
</header>
    <table width="100%" style="font-family: sans-serif;" cellpadding="10">
    <tr>
            
        <?php 
        $settings= DB::table('settings')->where('id',1)->first();

        ?>  

    
            <h3 style="margin-top:-50px; color:#019644;font-size: 30px; font-weight: bold; padding: 0px;">PC FOR ALL LTD</h3>
            <span style="margin-top:90px;">{{$settings->address}}</span>
            
            <span style="float:right;" >

            <span  id="basic-addon2" style="padding-right:10px;">
            <h3 style="margin-top:-20px; font-size: 20px; font-weight: bold; padding: 0px;">Invoice</h3> 
            <span style="margin-top:-20px;">Number # {{ $order_id }}</span>
            <span >Date: <?php echo $currentdate=date('Y-m-d'); ?></span>
            </span>
            <div style="margin-top:-20px;">

                <img src="http://pcforall.iciclecorp.space/public/frontend/images/pclogo.png" alt="logo" width="140" height="110" />

            </div>

          <span><strong>For Queries Please Contact</strong></span>
          <span><strong>Email: </strong> {{$settings->email}}</span>

          <span><strong>Telephone: </strong> {{$settings->phone}}</span>

          </span>        </tr>
    </table>
    <table width="100%" style="font-family: sans-serif;" cellpadding="10">
        <tr>  
            <?php 
                        $uid= $userid;
                        $user= DB::table('users')->where('id',$uid)->first();

                        ?>
                
<div style="border:1px solid #000000;text-align:center; width:50%;margin-top:100px;">
<h5 style="background-color:#019644; padding:2px; text-align:center;color:#ffffff;">To</h5>
<span><strong>{{  $user->first_name }} {{  $user->last_name }}</strong></span>  <br>
<span>            <strong>      {{ $user->address}}</strong>
</span> 
<span>                   <strong> {{$user->email}}</strong>
</span><br>
<strong> {{$user->phone}}  </strong>
</div>
        </tr>
    </table>
    <br>
  
    <br>
        <table class="table nob table-bordered"  class="items"  width="100%" style="margin-top:150px;font-size: 14px; float:left;border:1px solid #000000;" cellpadding="8">
        <tr>
  <th style="background-color:#019644 !important;color:#ffffff;">ID</th>
  <th style="background-color:#019644 !important;color:#ffffff;">Description</th>
  <th style="background-color:#019644 !important;color:#ffffff;"> Quantity</th>
  <th style="background-color:#019644 !important;color:#ffffff;">Unit Cost</th>


  <th style="background-color:#019644 !important;color:#ffffff;">Total Cost</th>

        </tr>
        <?php
        $totquantity=0; 
        $unitcost=0; 

        $oid=$order_id;

        $prod= DB::table('order_details')->where('order_id',$oid)->get();


        ?>
       
        @foreach ($prod as $pro)
           
            
            <?php

        $products= DB::table('product')->where('id',$pro->product_id)->get();
        $totquantity+=$pro->totalquantity;
        $ord= DB::table('orders')->where('order_id',$oid)->where('user_id',$uid)->first();


            ?>
            @foreach ($products as $product)
            <?php 
            $unitcost+=$product->price;

            ?>
            <tr>
            <td>{{$product->id}}</td>

            <td>{{$product->product_name}}                   
            
            </td>
            <td>{{$pro->totalquantity}}</td>

            <td>&pound;{{$product->price}}</td>

            <td>&pound;{{$pro->total_price}}</td>
            </tr>

            @endforeach
            @endforeach
            <tr>
            <td></td>
           <td> <?php 
            if($ord->processor || $ord->ram || $ord->monitor || $ord->ssd){?>
            <span><label>Add Ons</label><span>
            <?php $cprs=App\Product::where('id',$ord->processor)->first();
             if($cprs){
            ?>
                                <span>{{$cprs['product_name']}}</span>
             <?php
             }
              $rprs=App\Product::where('id',$ord->ram)->first();
              if($rprs){?>
                            <span>	{{$rprs['product_name']}}</span>
              <?php
              }
               $mprs=App\Product::where('id',$ord->monitor )->first();
               if($mprs){?>
                                <span>{{$mprs['product_name']}}	</span>												
               <?php } 
               $sprs=App\Product::where('id',$ord->ssd)->first();
               if($sprs){?>
                            <span>	{{$sprs['product_name']}}</span>


           <?php }
           }
            
            ?>
            </td>
            <td></td>

            <td>
            <?php 
            if($ord->processor || $ord->ram || $ord->monitor || $ord->ssd){?>
            <?php $cprs=App\Product::where('id',$ord->processor)->first();
            if($cprs){
            ?>

                                <span>&pound;{{$cprs['price']}}</span>
            <?php }
            $rprs=App\Product::where('id',$ord->ram)->first();
                                            if($rprs){

            ?>
                            <span>	&pound;{{$rprs['price']}}</span>
            <?php }    
            
$mprs=App\Product::where('id',$ord->monitor )->first();
if($mprs){?>
                                <span>&pound;{{$mprs['price']}}	</span>												
            <?php }
             $sprs=App\Product::where('id',$ord->ssd)->first();
             if($sprs){?>
                            <span>	&pound;{{$sprs['price']}}</span>


           <?php }}
            
            ?>
            </td>
            <td></td>

            </tr>
            <tr>

<td colspan="2" style="text-align: right;"><strong>Total</strong></td>
<td style="background-color: #D8FDBA !important;" ><strong>{{$totquantity}}</strong></td>
<td style="background-color: #D8FDBA !important;" ><strong>&pound;{{ $total_amount}}</strong></td>
<td  ></td>

</tr > 

<tr>
<td colspan="4" style="text-align: right;"><strong>Grand Total</strong></td>
<td style="background-color: #D8FDBA !important;" ><strong>&pound;{{ $total_amount}}</strong></td>


</tr > 
         
          </table>
          <h6><strong>Note: One Month Harware Warranty</strong></h6>
   
    
    <br>
    <table width="100%" style="font-family: sans-serif; font-size: 14px;margin-top:230px;" >
        <tr>
            <td>
                <table width="60%" align="left" style="font-family: sans-serif; font-size: 14px;" >
                    <tr>
                        <td style="padding: 0px; line-height: 20px;">&nbsp;</td>
                    </tr>
                </table>
               
            </td>
        </tr>
    </table>
    <br>
    <table width="100%" style="font-family: sans-serif; font-size: 14px;" >
        <br>

        <br>
    </table>
    <footer></footer>
</body>
</html>