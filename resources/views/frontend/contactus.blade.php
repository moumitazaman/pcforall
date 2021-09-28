@extends('frontend.layouts.app-page')

@section('title', 'Contact Us')

@section('content')

<main class="main">
    <div class="page-header" style="background-color:white;height:35px; padding-top:30px;">
        <h1 class="page-title">Get in touch</h1>
    </div>
    <?php 
		$settings=App\Settings::where('id',1)->first();


                ?>
    <div class="page-content mt-10 pt-4">
        <section class="contact-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-xs-5 ls-m pt-3">
                        <h2 class="font-weight-bold text-uppercase ls-m mb-2">Contact us</h2>
                        <p>Looking for help? Fill the form and start a new adventure.</p>

                        <h4 class="mb-1 text-uppercase">Headquarters</h4>
                        <p>{{$settings->address}}</p>

                        <h4 class="mb-1 text-uppercase">Phone</h4>
                        <p><a href="tel:#">{{$settings->phone}}</a></p>

                        <h4 class="mb-1 text-uppercase">Support</h4>
                        <p>
                            <a href="#">support@iciclecorp.space</a><br>
                            
                        </p>
                    </div>
                    <div class="col-lg-9 col-md-8 col-xs-7">

                    @include('backend.layouts.flash')

                        <form class="ml-lg-2 pt-8 pb-10 pl-4 pr-4 pl-lg-6 pr-lg-6 grey-section" action="{{ url('contact-us')}}" method="POST">
                        @csrf
                            <h3 class="ls-m mb-1">Let’s Connect</h3>
                            <p class="text-grey">Your email addres will not be published. Required fields are
                                marked *</p>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <input class="form-control" name="name" type="text" placeholder="Name *" required>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <input class="form-control" name="email" type="email" placeholder="Email *" required>
                                </div>
                                <div class="col-12 mb-4">
                                    <textarea name="message_body" class="form-control" required
                                        placeholder="Your Message *"></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-md btn-primary mb-2">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- End About Section-->

        <!--<section class="store-section pt-10 pb-10">
            <div class="container">
                <h2 class="title mt-2">Our Stores</h2>
                <div class="row cols-sm-2 cols-lg-4">
                    <div class="store">
                        <figure>
                            <img src="images/subpages/store-1.jpg" alt="store" width="280" height="280">
                            <h4 class="overlay-visible">New York</h4>
                            <div class="overlay overlay-transparent">
                                <a class="mt-8" href="mail:#">mail@newyorkdonaldstore.com</a>
                                <a href="tel:#">Phone: (123) 456-7890</a>
                                <div class="social-links mt-1">
                                    <a href="#" class="social-link social-facebook fab fa-facebook-f"></a>
                                    <a href="#" class="social-link social-twitter fab fa-twitter"></a>
                                    <a href="#" class="social-link social-linkedin fab fa-linkedin-in"></a>
                                </div>
                            </div>
                        </figure>
                    </div>
                    <div class="store">
                        <figure>
                            <img src="images/subpages/store-2.jpg" alt="store" width="280" height="280">
                            <h4 class="overlay-visible">London</h4>
                            <div class="overlay overlay-transparent">
                                <a class="mt-8" href="mail:#">mail@londondonaldstore.com</a>
                                <a href="tel:#">Phone: (123) 456-7890</a>
                                <div class="social-links mt-1">
                                    <a href="#" class="social-link social-facebook fab fa-facebook-f"></a>
                                    <a href="#" class="social-link social-twitter fab fa-twitter"></a>
                                    <a href="#" class="social-link social-linkedin fab fa-linkedin-in"></a>
                                </div>
                            </div>
                        </figure>
                    </div>
                    <div class="store">
                        <figure>
                            <img src="images/subpages/store-3.jpg" alt="store" width="280" height="280">
                            <h4 class="overlay-visible">Oslo</h4>
                            <div class="overlay overlay-transparent">
                                <a class="mt-8" href="mail:#">mail@oslodonaldstore.com</a>
                                <a href="tel:#">Phone: (123) 456-7890</a>
                                <div class="social-links mt-1">
                                    <a href="#" class="social-link social-facebook fab fa-facebook-f"></a>
                                    <a href="#" class="social-link social-twitter fab fa-twitter"></a>
                                    <a href="#" class="social-link social-linkedin fab fa-linkedin-in"></a>
                                </div>
                            </div>
                        </figure>
                    </div>
                    <div class="store">
                        <figure>
                            <img src="images/subpages/store-4.jpg" alt="store" width="280" height="280">
                            <h4 class="overlay-visible">Stockholm</h4>
                            <div class="overlay overlay-transparent">
                                <a class="mt-8" href="mail:#">mail@stockholmdonaldstore.com</a>
                                <a href="tel:#">Phone: (123) 456-7890</a>
                                <div class="social-links mt-1">
                                    <a href="#" class="social-link social-facebook fab fa-facebook-f"></a>
                                    <a href="#" class="social-link social-twitter fab fa-twitter"></a>
                                    <a href="#" class="social-link social-linkedin fab fa-linkedin-in"></a>
                                </div>
                            </div>
                        </figure>
                    </div>
                </div>
            </div>
        </section>-->
        <!-- End Store Section -->

        <!-- Google Maps - Go to the bottom of the page to change settings and map location. -->
        <!--<div class="grey-section google-map" id="googlemaps" style="height: 386px"></div>-->
        <!-- End Map Section -->
    </div>
</main>
@endsection