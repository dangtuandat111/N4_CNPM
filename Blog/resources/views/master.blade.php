<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="TemplateMo" />
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet" />

        <title>Blog CĐCN PHẦN MỀM 12 - @yield('Title')</title>

        <!-- Arcticle Part -->
        <link rel='stylesheet' id='fancybox2_se111o-css' href="{{ asset('Blog_resources/wp-content/themes/thelondoner_v3/vendor/hover-css/hover-min.css') }}" type='text/css' media='all' />
        <link rel='stylesheet' id='fancybox2_se111o-css' href="{{ asset('Blog_resources/wp-content/themes/thelondoner_v3/css/style.css') }}" type='text/css' media='all' />
        <link rel='stylesheet' id='flickity-css' href='https://cdnjs.cloudflare.com/ajax/libs/flickity/2.1.2/flickity.min.css' type='text/css' media='all' />
        <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js' id='jquery-js'></script>

        <!-- Bootstrap core CSS -->
        <link href="{{ asset('Blog_resources/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

        <!-- Additional CSS Files -->
        <link rel="stylesheet" href="{{ asset('Blog_resources/css/fontawesome.css') }}" />
        <link rel="stylesheet" href="{{ asset('Blog_resources/css/templatemo-stand-blog.css') }}"/>
        <link rel="stylesheet" href="{{ asset('Blog_resources/css/owl.css') }}"/>

        <!-- Custom CSS Files -->
        <link rel="stylesheet" href="{{ asset('Blog_resources/css/mycss.css') }}" />

        <!-- Icon File -->
        <link rel="stylesheet" href="{{ asset('Blog_resources/fontawesome-free-6.0.0-beta2-web/css/all.min.css') }}" />

        @yield('Link')

       
    </head>
</html>
  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- TODO: Thay doi duong dan -->
    <!-- Header -->
    <header class="">
        <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/home') }}">
                <h2>Blog<em>.</em><mark>CĐCN Phần mềm 12</mark></h2>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">
                            HOME
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/Category/Travel') }}" name = "Travel" >Travel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/Category/Food') }}">Food</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/Category/Vehicle') }}">Vehicle</a>
                    </li>
                    </li>
                    @if(Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/Profile') }}" style = "color: #007bff;">
                        {{ Auth::user()->LastName }}</a>
                    </li>
                    
                    <li class="nav-item" >
                        <a class="nav-link" href="{{ url('/Logout') }}">Logout</a>
                    </li>
                    @endif
                    @if(!(Auth::check()))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/Login') }}">Login/Register</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
        </nav>
    </header>
    <!-- Header End -->

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="main-banner header-text" id="main-banner">
        <div class="container-fluid">

        <div class="owl-banner owl-carousel">
            @foreach($banners as $banner) 
            <div class="item">
                <img src="{{ asset('Blog_resources/images/assets/images/thumbnail/'.$banner->Thumbnail) }}" alt="" />

                <div class="item-content">
                    <div class="main-content">
                        <div class="meta-category">
                            <span>
                            @foreach($cats as $cat) 
                                @if ($cat->id == $banner->Id_Category)
                                    <?php  echo 'Category:'.$cat->Title ;?>
                                @endif
                            @endforeach
                            </span>
                        </div>
                        <a href="{{ url('/BlogDetail/'.$banner->Slug) }}"><h4>
                            <?php  echo 'Posts name:'.$banner->Title ;?>
                        </h4></a>
                        <ul class="post-info">
                            <li><a >
                                <?php  echo 'Date: '.\Carbon\Carbon::parse($banner->Created_at)->format('d/m/Y') ;?>   
                            </a></li>
                            <li><a >
                                <?php  echo 'Views: '.$banner->views ;?>   
                            </a></li>
                            <li><a>
                            @foreach($cmts as $cmt) 
                                @if($cmt[0] == $banner->Id_Category) 
                                    <?php  echo 'Comments:'.$cmt[1];?>
                                @endif
                            @endforeach
                            </a></li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        </div>
    </div>
    <!-- Banner Ends Here -->

    <!-- Message here -->
    <!-- End Message here -->


    <!-- Main - Change Here -->
    @yield('Main')
    <!-- Main - Change Here -->
    
    <!-- Footer Here -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="social-icons">
                        <li><a href="#">Facebook</a></li>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Instagram</a></li>
                        <li><a href="#">Youtube</a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <h6 style = "color:white; font-size:2rem; padding-bottom:10px;text-align:left">About</h6>
                    <p class="text-justify">Blog <i>CĐCN PHẦN MỀM 12</i>was born back in April 2014 on a surprisingly warm afternoon.In what seemed like an oasis of calm between assignments, WE (that’s us!) were talking about sharing our travel stories and photos with others like-minded travellers on the internet. So On that fateful day <i>CĐCN PHẦN MỀM 12</i> was online and ready to go!</p>
                </div>

                <div class="col-xs-6 col-md-3">
                    <h6 style = "color:white; font-size:2rem; padding-bottom:10px;text-align:left">Categories</h6>
                    <ul class="footer-links">
                    <li><a href="{{ url('/Category/Travel') }}">Travel</a></li>
                    <li><a href="{{ url('/Category/Food') }}">Food</a></li>
                    <li><a href="{{ url('/Category/Vehicle') }}">Vehicle</a></li>
                    </ul>
                </div>

                <div class="col-xs-6 col-md-3">
                    <h6 style = "color:white; font-size:2rem; padding-bottom:10px;text-align:left">Quick Links</h6>
                    <ul class="footer-links">
                        <li><a href="{{ url('/home') }}">Home</a></li>
                        <li><a href="{{ url('/About-us') }}">About us</a></li>
                        <li><a href="{{ url('/Login') }}">Login/Register</a></li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class= "row" style ="padding:15px;">
                <p class="copyright-text">Copyright &copy; 2021 All Rights Reserved by <a href="#">CĐCN PHẦN MỀM 12</a>.</p>
          </div>
            </div>
        </div>
    </footer>  
    <!-- Footer End Here -->

    <!-- Modal here -->
    
    <!-- Modal End here -->



    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('Blog_resources/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('Blog_resources/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Additional Scripts -->
    <script src="{{ asset('Blog_resources/js/custom.js') }}"></script>
    <script src="{{ asset('Blog_resources/js/owl.js') }}"></script>
    <script src="{{ asset('Blog_resources/js/slick.js') }}"></script>
    <script src="{{ asset('Blog_resources/js/isotope.js') }}"></script>
    <script src="{{ asset('Blog_resources/js/accordions.js') }}"></script>

    <!-- Custom JS Files -->
    <script src="{{ asset('Blog_resources/js/myjs.js') }}"></script>

    <script language = "text/Javascript"> 
        cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
        function clearField(t){                   //declaring the array outside of the
        if(! cleared[t.id]){                      // function makes it static and global
            cleared[t.id] = 1;  // you could use true and false, but that's more typing
            t.value='';         // with more chance of typos
            t.style.color='#fff';
            }
        }

    </script>

    <!-- Add script Here -->
    @yield('Script')

    <script>
        function HideMess() {
            $('#alert').fadeOut(1000);
            setTimeout(() => { $('#alert').remove(); }, 1000);

        }

        console.log(1);
        var TravelActive = document.getElementsByClassName("nav-item");
        console.log(3);
        TravelActive[0].className = "nav-item active";
                    
        </script>
    <!-- Add script Here -->

  </body>
</html>