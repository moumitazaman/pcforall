@extends('frontend.layouts.app-page')

@section('title', 'Repair')

@section('content')
        <main class="main">
            <div class="page-header" style="background-color:white;height:35px; padding-top:30px;">
                <h1 class="page-title">Repair</h1>
            </div>
            
            <style>
.repair{
    height:450px;
}

.text_sec{
   
}
</style>
             
            <div class="page-content mt-10 pt-7">
                <section class="about-section">
                    <div class="container">
                        <div class="row mb-10">
                            <div class="col-md-6">
                          <img class="w-100 mb-4 appear-animate"
                                    data-animation-options="{'name':'fadeInLeftShorter'}"
                                    src="<?php echo asset('/').'front/images/subpages/03.jpg';?>" alt="Donald Store" width="587" height="450"
                                    style=" top: 2rem;">
                                
                      
                                <img class="w-100 mb-4 appear-animate repair"
                                    data-animation-options="{'name':'fadeInLeftShorter'}"
                                    src="<?php echo asset('/').'front/images/subpages/repair.jpg';?>" alt="Donald Store" 
                                    style=" top: 2rem;">

                                

                            </div>
                            <div class="col-md-6 order-md-first pt-md-5 text_sec">
                                <h3 class="ls-m" style="line-height:1.3;">Repair Computer, Laptop, Desktop PC, Mobile, IT Support and Develop Website, APP</h3>
                                <p class="font-primary font-weight-semi-bold">
                               <p> PC for All Ltd. provides IT Solutions for small business and private individuals. We sell computers as well as PC Accessories in reasonable cost.</p>
</p><p>We also provide below repair services:<br>
1.	Repair services for all standard smartphones or tablet<br>
2.	Computer repair services for broken screens<br>
3.	Charging or battery issues, <br>
4.	Water/liquid damage<br>
5.	Software issues. <br>
6.	Virus removals <br>
7.	Operating system upgrades and installation<br>
8.	Data recovery/Backup <br>
9.	Overheating issue<br>
10.	Motherboard/Graphics card repair<br>
11.	Real-time online remote support for business solution<br>
12.	Build gaming PCs<br>
</p>
<p>Network configuration and design is essential to the smooth operation of your business. That’s why PC For All offers Network services for SMB’s, providing dedicated expert advice and steering further as well as long term backing support and maintenance for your business.
</p>
<p>We build your website as indicated by your necessities and financial plan. Web design for your business or personal use fully customizable and maintained by us. Bespoke Design and Layout. Full training provided by our qualified team of Web Developers. Please feel free to contact us and visit our another website <span style="color:#05B895;"><a href="https://www.webrobotic.co.uk/ ">https://www.webrobotic.co.uk/</a> </span>for more information. 
We have shops in West London and in East London. 


</p>

                               
                               
                            </div>


                            <div>
                            


                            
                            </div>
                        </div>
                    </div>

                    
                </section>
                <!-- End About Section-->

                <!-- End Clients Section -->
            </div>
        </main>
        <style>
            .list-circle i {
                background-color: aliceblue;
            }

            </style>
      @endsection