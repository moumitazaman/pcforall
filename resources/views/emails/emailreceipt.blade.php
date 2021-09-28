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
        /*border: 0.1mm solid #e7e7e7;*/
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
        /*border: 0.1mm solid #e7e7e7;*/
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
    </style>
    <title>Invoice</title>
</head>

<body>
<header>
</header>
    <table width="100%" style="font-family: sans-serif;" cellpadding="10">
    <tr>
            <td width="100%" style="text-align: center; font-size: 20px; font-weight: bold; padding: 0px;">
            PC FOR ALL <br>
            </td>
          <td height="10" style="font-size: 0px; line-height: 10px; height: 10px; padding: 0px;">&nbsp;</td>
        </tr>
        <tr>
            <td width="100%" style="text-align: center; font-size: 20px; font-weight: bold; padding: 0px;">
            Receipt Voucher<br>
            </td>
          <td height="10" style="font-size: 0px; line-height: 10px; height: 10px; padding: 0px;">&nbsp;</td>
        </tr>
    </table>
    <table width="100%" style="font-family: sans-serif;" cellpadding="10">
        <tr>  <?php 
                        $uid= $userid;
                        $user= DB::table('users')->where('id',$uid)->first();

                        ?>
            <td width="49%" style="border: 0.1mm solid #eee;"><span style="display: inline-block;width: 200px;"><strong>{{  $user->first_name }} {{  $user->last_name }}</strong></span> <br>
<span>                  {{ $user->address}}
</span> 
<span>                    {{$user->email}}
</span><br>
                    {{$user->phone}}                     </td>
            <td width="2%">&nbsp;</td>
            <td width="49%" style="border: 0.1mm solid #eee;"> <span style="float:right;"><strong>Invoice Bill Number: {{ $order_id }}</strong><br>Date : <?php echo $currentdate=date('Y-m-d H:i:s'); ?></span>
</td>
        </tr>
    </table>
    <br>
  
    <br>
    <table class="items"  width="100%" style="margin-top:150px;font-size: 14px; float:left; border-collapse: collapse;" cellpadding="8">
        <thead>
            <tr>
                <td width="40%" style="text-align: left;"><strong>Name</strong></td>
                <td width="20%" style="text-align: left;"><strong>Price</strong></td>
                <td width="20%" style="text-align: left;"><strong>No. of Items</strong></td>

                <td width="20%" style="text-align: left;"><strong>Amount</strong></td>

            </tr>
        </thead>
        <tbody>
            <!-- ITEMS HERE -->
             
            <tr>
                <td style="padding: 0px 7px; line-height: 20px;">
                    <br>
                </td>
                <td style="padding: 0px 7px; line-height: 20px;">
                    <br>
                </td>
                <td style="padding: 0px 7px; line-height: 20px;">
                    <br>
                </td>
                <td style="padding: 0px 7px; line-height: 20px;">
                    <br>
                </td>
            </tr>
            <?php 
                            $oid=$order_id;
                            $prod= DB::table('order_details')->where('order_id',$oid)->get();


                            ?>
                           
                            @foreach ($prod as $pro)
                               
                            <tr>

                                <?php 
                            $products= DB::table('product')->where('id',$pro->product_id)->get();

                                ?>
                                @foreach ($products as $product)
                                <td>{{$product->product_name}}</td>
                                <td>{{$product->price}}</td>

                                <td>{{$pro->totalquantity}}</td>
                                <td>{{$pro->total_price}}</td>

                                @endforeach
                                </tr>

                                @endforeach
                              
                                   
                                    
           
        </tbody>
    </table>
   
    
    <br>
    <table width="100%" style="font-family: sans-serif; font-size: 14px;margin-top:230px;" >
        <tr>
            <td>
                <table width="60%" align="left" style="font-family: sans-serif; font-size: 14px;" >
                    <tr>
                        <td style="padding: 0px; line-height: 20px;">&nbsp;</td>
                    </tr>
                </table>
                <table width="40%" align="right" style="font-family: sans-serif; font-size: 14px;" >
                    <tr>
                        <td style="border: 1px #eee solid; padding: 0px 8px; line-height: 20px;"><strong>Total Amount</strong></td>
                        <td style="border: 1px #eee solid; padding: 0px 8px; line-height: 20px;">{{ $total_amount}}</td>
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