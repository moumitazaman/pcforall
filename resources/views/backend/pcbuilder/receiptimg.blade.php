<html>
<head>
    <style>
    @page{
        size:letter;
    }
   
    html {
        width: 100%;
    height: 70%;

}
    body {
        font-family: sans-serif;
        font-size: 10pt;
       background-color: #ffffff;  
        background-repeat: no-repeat;
        background-position: 50% 50%; 
        background-size:729px 424px;
      
  
    }
    header{

        width:100%;
        height: 154px;
        
        text-align:center;
        margin: 0 auto;
       position:fixed;
    

    }

    footer{

    width:100%;
    height: 84px;
    text-align:center;
    margin: 0 auto;
    padding:0px;
    left: 0px;
    right: 0px;
   
    


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
<img src="{{ public_path() .'/backend/img/logo.jpg' }}" />
</header>
    <table width="100%" style="margin-top:150px;font-family: sans-serif;" cellpadding="10">
    
        <tr>
            <td width="100%" style="text-align: center; font-size: 20px; font-weight: bold; padding: 0px;">
            Invoice<br>
            </td>
          <td height="10" style="font-size: 0px; line-height: 10px; height: 10px; padding: 0px;">&nbsp;</td>
        </tr>
    </table>
    <?php 
		$settings=App\Setting::where('id',1)->first();


				?>
                <?php 
                    $cus= DB::table('customer')->where('customer_id',$bill->customer_id)->first();
                        ?>
    <table width="100%" style="font-family: sans-serif;" cellpadding="10">
        <tr>
            <td width="50%" style="border: 0.1mm solid #eee;"><span style="display: inline-block;width: 500px;"><strong></strong><br>{{$cus->customer_name }}<br>{{$cus->address }}<br>{{$cus->phone }}</span><span style="display: inline-block;width: 200px; float:right;"><strong></strong><br>{{$bill->to_name }}<br>{{$bill->to_address }}<br>{{$bill->to_phone }}</span></td>
            <td width="50%" style="border: 0.1mm solid #eee;"><span style="float:right;"><strong>Invoice Bill Number: {{ $bill->invoice_no }}</strong><br>Date : {{ $bill->created_at->format('d/m/Y') }}</span>
</td>
        </tr>
    </table>
    <br>
    <table width="100%" style="font-family: sans-serif; font-size: 14px;" >
        <tr>
            <td>
                <table width="60%" align="left" style="font-family: sans-serif; font-size: 14px;" >
                    <tr>
                        <td style="padding: 0px; line-height: 20px;">&nbsp;</td>
                    </tr>
                </table>
                <table width="40%" align="right" style="font-family: sans-serif; font-size: 14px;" >
                    <tr>
                        <td style="border: 1px #eee solid; padding: 0px 8px; line-height: 20px;"><strong>VAT No.</strong></td>
                        <td style="border: 1px #eee solid; padding: 0px 8px; line-height: 20px;">{{ $settings->vat_no}}</td>
                    </tr>
                   
                    <tr>
                        <td style="border: 1px #eee solid; padding: 0px 8px; line-height: 20px;"><strong>Previous Due</strong></td>
                        <td style="border: 1px #eee solid; padding: 0px 8px; line-height: 20px;">{{ $bill->due}}</td>
                    </tr>
                    <tr>
                        <td style="border: 1px #eee solid; padding: 0px 8px; line-height: 20px;"><strong>Paid Amount:</strong></td>
                        <td style="border: 1px #eee solid; padding: 0px 8px; line-height: 20px;">{{ $bill->amount}}</td>
                    </tr>
                    @if($bill->amount - $bill->due >0)

                    <tr>
                        <td style="border: 1px #eee solid; padding: 0px 8px; line-height: 20px;"><strong>Current Due:</strong></td>
                        <td style="border: 1px #eee solid; padding: 0px 8px; line-height: 20px;">{{ 0 }}</td>
                    </tr>
                    @endif
                    @if(($bill->amount - $bill->due) < 0)

                    <tr>
                        <td style="border: 1px #eee solid; padding: 0px 8px; line-height: 20px;"><strong>Current Due:</strong></td>
                        <td style="border: 1px #eee solid; padding: 0px 8px; line-height: 20px;">{{ abs($bill->amount - $bill->due) }}</td>
                    </tr>
                    @endif
                </table>
            </td>
        </tr>
    </table>
    <br>
    <table class="items"  width="100%" style="margin-top:200px;font-size: 14px; float:left; border-collapse: collapse;" cellpadding="8">
        <thead>
            <tr>
                <td width="15%" style="text-align: left;"><strong>Sl</strong></td>
                <td width="25%" style="text-align: left;"><strong>Project</strong></td>
                <td width="25%" style="text-align: left;"><strong>Price</strong></td>
                <td width="25%" style="text-align: left;"><strong>Quantity</strong></td>
                <td width="25%" style="text-align: left;"><strong>Total Amount</strong></td>

              

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
                    $proj= DB::table('products')->where('project_id',$bill->project_id)->first();
                        ?>
            <tr>
            <td>1</td>
            <td>{{$proj->name}}</td>

                           <td>{{$bill->sale_rate}}</td>
                           <td>{{$bill->quantity}}</td>
                           <td>{{$bill->amount}}</td>
            </tr>
           
                               
                             
                                   
                                    
           
        </tbody>
    </table>
  
    <br>
    <table width="100%" style="font-family: sans-serif; font-size: 14px;margin-top:350px;margin-bottom:150px;" >
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
                        <td style="border: 1px #eee solid; padding: 0px 8px; line-height: 20px;">{{ $bill->amount}}</td>
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
    <footer>
    <!--<img src="{{ public_path() .'/backend/img/letterfoot.png' }}" />-->

    </footer>
</body>
</html>