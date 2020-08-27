<!DOCTYPE HTML>
<html lang="en">
<head>

@yield('title')

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	
@yield('css')

	<!-- Font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- Stylesheets -->
	
	<link href="{{ asset ('plugin-frameworks/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset ('plugin-frameworks/swiper.css') }}" rel="stylesheet">


	
	<link href="{{ asset ('fonts/ionicons.css') }}" rel="stylesheet">
	
		
	<link href="{{ asset ('css/styles.css') }}" rel="stylesheet">
	
	<style>
    .email:focus {
        border: none !important;
    }
	</style>
	
</head>
<body class="body" style="background: #f8f8f8;">
	
	<header>
		<a class="logo pl-10" href="{{route('home')}}"><img src="{{ asset('images/logo3.png') }}" alt="Logo"></a>
		
		<div class="right-area">
			<form class="src-form" action="{{ route('search') }}" method="POST">
            @csrf 

				<button type="submit"><i class="fa fa-search"></i></a></button>
				<input type="text" name="search" placeholder="Search here">
				
			</form><!-- src-form -->
		</div><!-- right-area -->
		
		<a class="menu-nav-icon" data-menu="#main-menu" href="#"><i class="fa fa-navicon"></i></a>
		
		<ul class="main-menu" id="main-menu">
			<li><a href="{{route('home')}}">Home</a></li>
			@auth
			@if ($notice)
				<li><a href="{{route('notices')}}">Notices <span style="color: red;">{{$notice}}</span></a></li>
			@else
				<li><a href="{{route('notices')}}">Notices</a></li>
			@endif
			@endauth
			{{-- <li class="drop-down"><a href="#!">Sport<i class="fa fa-caret-down"></i></a>
				<ul class="drop-down-menu drop-down-inner">
					<li><a href="#">PAGE 1</a></li>
					<li><a href="#">PAGE 2</a></li>
				</ul> --}}
			</li>
			<li><a href="{{route('members')}}">Members</a></li>
			<li><a href="http://malikalnabouli.herokuapp.com/">About</a></li>
			<li><a href="{{route('contact')}}">Contact</a></li>

                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Signup') }}</a>
                                </li>
                            @endif
                        @else

			<li style="margin-left: 30px;" class="drop-down"><a href="{{route('profile', ['id'=> Auth::user()->id])}}">                   
			 <img class="dropdown im" src="{{ asset(Storage::url(Auth::user()->avatar)) }}" style="width: 32px; height: 32px; position: absolute; top:20px; left: -23px; border-radius: 50%;">
                    {{ Auth::user()->name }} <span class="caret"></span><i class="fa fa-caret-down"></i></a>
				<ul class="drop-down-menu drop-down-inner">

                 <li><a href="{{route('profile', ['id'=> Auth::user()->id])}}">Profile</a></li>
                
                  <li><a href="{{route('edit-profile', ['id'=> Auth::user()->id])}}">Edit Profile</a></li>

                  <li><a href="{{ route('change-password') }}">Change Password</a></li>

                 <li> <a style="font-size: 15px;" class="fa fa-sign-out" href="{{ route('logout') }}"
                     onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                     <b> Logout</b>
                  </a></li>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>    				
				</ul>
			</li>

             @endguest

		</ul>
		
		<div class="clearfix"></div>
	</header>
	





@yield('content')




    
	<footer class="bg-191 color-ash pt-50 pb-20 text-left center-sm-text">
		
		<div class="container-fluid">
			<div class="row">
			
				<div class="col-lg-1"></div>
				
				<div class="col-md-4 col-lg-6 mb-30">
					<div class="card h-100">
						<div class="dplay-tbl">
							<div class="dplay-tbl-cell">
							
								<a href="{{route('home')}}"><h1 style="font-size: 40px; padding-top: 10px; color: #fff;"><b><span style="color: #F9B500;">FACE</span>Libya</b></h1></a>
								<p class="color-ash mt-25"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made <img style="width: 30px; height: 25px;" width="30px" height="25px" src="{{ asset('images/up2.png') }}"> by <a href="http://malikalnabouli.herokuapp.com/" >Malik Alnabouli</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
								
							</div><!-- dplay-tbl-cell -->
						</div><!-- dplay-tbl -->
					</div><!-- card -->
				</div><!-- col-lg-4 col-md-6 -->
				
				<div class="col-md-4 col-lg-2 mb-30">
					<div class="card h-100">
						<div class="dplay-tbl">
							<div class="dplay-tbl-cell">
							
								<ul class="list-a-plr-10">
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-instagram"></i></a></li>
									<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								</ul>
								
							</div><!-- dplay-tbl-cell -->
						</div><!-- dplay-tbl -->
					</div><!-- card -->
				</div><!-- col-lg-4 col-md-6 -->
				
				<div class="col-md-4 col-lg-2 mb-30 text-left">
					<div class="card h-100">
						<div class="dplay-tbl">
							<div class="dplay-tbl-cell">
								<form class="form-block form-brdr-b mx-w-400x m-auto">
						
									<input class="color-white ptb-15 center-sm-text email" type="text" placeholder=" Your Email">
									<button class="mt-30 btn-brdr-grey color-ash w-100 text-center" type="submit">SUBSCRIBE</button>
								
								</form>
							</div><!-- dplay-tbl-cell -->
						</div><!-- dplay-tbl -->
					</div><!-- card -->
				</div><!-- col-lg-4 col-md-6 -->
				
			</div><!-- row -->
		</div><!-- container -->
	</footer>
	
	<!-- SCIPTS -->
	
@yield('js')



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="{{ asset('/js/like.js') }}"></script>
    <script>
      var token = '{{ Session::token() }}';
      var urlLike = '{{ route('like') }}';
    </script>

	<script>
      var token = '{{ Session::token() }}';
      var urlcomLike = '{{ route('comlike') }}';
    </script>

	<script src="{{ asset ('plugin-frameworks/jquery-3.2.1.min.js') }}"></script>
	
	<script src="{{ asset ('plugin-frameworks/bootstrap.min.js') }}"></script>
	
	<script src="{{ asset ('plugin-frameworks/swiper.js') }}"></script>
	
	
	<script src="{{ asset ('js/scripts.js') }}"></script>

		<script src="{{ asset ('js/chat.js') }}"></script>

</body>
</html>