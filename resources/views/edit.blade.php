@extends('layouts.main')

@section('title')
    <title>Edit {{$users->name}} Profile</title>
@endsection



@section('css')

    <style>
label {
  display: block;
  cursor: pointer;
  background: grey;
  width: 100px;
  height: 30px;
  border-radius: 50px;
  text-align: center;
  line-height: 30px;
  color: #fff;
}

.hidden {
  position: absolute;
  left: -99999px;
}

        header{
            background: #191919;
        }

    </style>


        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>


	<link rel="icon" type="image/png" href="{{  asset('images/icon/edit.png') }}"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{  asset('profile/css/bootstrap.min.css') }}">
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="{{  asset('profile/css/font-awesome.min.css') }}">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="{{  asset('profile/css/swiper.min.css') }}">
    <!-- Styles -->
    <link rel="stylesheet" href="{{  asset('profile/css/style.css') }}">

@endsection


@section('content')

        <div style="margin-top: -50px;" class="row">
            <div class="col-12">
                <div class="swiper-container hero-slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="hero-content flex justify-content-center align-items-center flex-column">
                                <img style="height: 300px;" src="{{ asset(Storage::url($users->cover)) }}" alt="">



                            </div><!-- .hero-content -->
                            <div style="margin-top: -50px; justify-content-left">
                        <form action="  {{ route('edit-cover', ['id'=> Auth::user()->id]) }} " method="post" enctype="multipart/form-data"  id="form">
                        @method('PATCH')
                        @csrf
                            <div class="upload">
                                <label for="file"><i class="fa fa-camera"> Change</i></label>
                                <input type="file" name="cover" id="file" class="hidden" />
                            </div>
                        </form>                            
                        </div>
                        </div><!-- .swiper-slide -->

                    </div><!-- .swiper-wrapper -->

                    <!-- Add Pagination -->

                    <!-- Add Arrows -->

                </div><!-- .swiper-container -->
            </div><!-- .col -->
        </div><!-- .row -->

        <div class="container">
            <div class="row pb-70">
                <div class="offset-lg-9 col-12 col-lg-3">
                        <div class="yt-subscribe pb-40">
                            <img style="border-radius: 50%;" src="{{ asset(Storage::url($users->avatar)) }}" alt="Youtube Subscribe">
                            
                        <form action="  {{ route('edit-avatar', ['id'=> Auth::user()->id]) }} " method="post" enctype="multipart/form-data"  id="form-f">
                        @method('PATCH')
                        @csrf
                            <div class="upload">
                                <label for="form-file"><i class="fa fa-camera"> Change</i></label>
                                <input type="file" name="avatar" id="form-file" class="hidden" />
                            </div>
                        </form>
                        
                            {{-- <h3 style="color: rgba(0, 0, 0, 0);">f</h3>
                            <p style="color: rgba(0, 0, 0, 0);">f</p> --}}
                        </div><!-- .yt-subscribe -->
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->


    <div class="container single-page">
        <div class="row">

	<section style="margin-bottom: -100px;" class="bg-1-white pt-70 zzz ptn-sm-50">
		<div class="container">

			<div class="row">
				<div class="col-xl-2"></div>
				<div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
					<form action="  {{ route('edit', ['id'=> Auth::user()->id]) }} " method="post" enctype="multipart/form-data" class="form-block form-h-55 form-plr-20 form-bg-white text-center">
	                @method('PATCH')
                    @csrf

    <div class="row" style="margin-top: -10px;">
     @if ($errors->count())
        <div class="alert alert-danger col-lg-6 col-sm-12 col-md-6" style="background: #F9B500; border-radius: 25px;">
                @foreach ($errors->all() as $error)
                    <p style="color: #fff;">{{ $error }}</p>
                @endforeach
        </div>
    @endif
	</div>

                        <div class="row ">
							<div class="col-lg-6 col-sm-12 col-md-6 mb-30">
								<input  style="border: solid 1px #000; border-radius: 25px;" type="text" name="name" placeholder="Name" value="{{Auth::user()->name}}">
                               
                            </div><!-- col-sm-6-->	
							
							<div class="col-lg-6 col-sm-12 col-md-6 mb-30">
								<input style="border: solid 1px #000;border-radius: 25px;" type="text" name="bio" placeholder="Bio" value="{{Auth::user()->bio}}">
							</div><!-- col-sm-6-->
							
							<div class="col-lg-12 col-xl-12 col-sm-12 col-md-12 mb-30">
								<textarea style="border: solid 1px #000; border-radius: 25px;" class="ptb-20 min-h-100x" name="about" placeholder="About Me">{{Auth::user()->about}}</textarea>
							</div><!-- col-sm-12-->
							
						</div><!-- row-->
						<button style="border: solid 1px #000;" class="btn-b-lg btn-brdr-grey plr-25 color-ash" type="submit"><b>Save Changes</b></button>
						
					</form>
				</div><!-- col-sm-6-->	
			</div><!-- row-->	
		</div><!-- container -->
	</section>

    </div>
    </div>


@endsection


@section('js')

<script>

    document.getElementById("file").onchange = function() {
    document.getElementById("form").submit();
};

    document.getElementById("form-file").onchange = function() {
    document.getElementById("form-f").submit();
};

</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type='text/javascript' src='{{  asset('profile/js/jquery.js') }}'></script>
<script type='text/javascript' src='{{  asset('profile/js/swiper.min.js') }}'></script>
<script type='text/javascript' src='{{  asset('profile/js/custom.js') }}'></script>


@endsection