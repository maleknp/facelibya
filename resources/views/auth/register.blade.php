@extends('layouts.main')

@section('title')
    <title>Signup</title>
@endsection

@section('css')

	<link rel="icon" type="image/png" href="images/icon/login.png"/>

    <style>
    input:focus,
    input:active {
        outline: none !important;
        box-shadow: none !important;
    }
	</style>
@endsection

@section('content')



	<div class="slider-main h-300x h-sm-auto pos-relative pt-95 pb-25">
		<div class="img-bg bg-layer-4" style="background: url(images/login.png) no-repeat center; background-size: cover;"></div>
		<div class="container-fluid h-100 mt-xs-50">
			<div class="dplay-tbl">
				<div class="dplay-tbl-cell color-white text-center">
				
					<h1 class="ptb-50"><b>SIGN<span style="color: #F9B500;">UP</span></b></h1>
					
				</div><!-- dplay-tbl-cell -->
			</div><!-- dplay-tbl -->
		</div><!-- container -->
	</div><!-- slider-main -->
	
	
	<section class="bg-1-white ptb-70 ptn-sm-50">
		<div class="container">
			<div class="row">
				<div class="col-xl-2"></div>
				<div style="margin-top: -50px;" class="col-sm-12 col-md-12 col-lg-12 col-xl-8">
					<form class="form-block form-h-55 form-plr-20 form-bg-white text-center" method="POST" action="{{ route('register') }}">
                    @csrf

						<div class="row">
							<div class="col-sm-12 col-lg-6 mb-30">
                                <input style="border: solid 1px #000;" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div><!-- col-sm-6-->	
							
							<div class="col-sm-12 col-lg-6 mb-30">
                                <input style="border: solid 1px #000;" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-Mail">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror							
                            </div><!-- col-sm-6-->
							
							<div class="col-sm-12 col-lg-6 mb-30">
                                <input style="border: solid 1px #000;" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div><!-- col-sm-6-->

							<div class="col-sm-12 col-lg-6 mb-30">
                                <input style="border: solid 1px #000;" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="confirm password">
                            </div><!-- col-sm-6-->

							
						</div><!-- row-->
						<button style="border: solid 1px #000;" class="btn-b-lg btn-brdr-grey plr-25 color-ash" type="submit"><b>Send Message</b></button>
						
							<div style="margin-top: -20px;" class="col-sm-12 mb-30">
                            @if (Route::has('password.request'))
                                <a style="margin-bottom: -80px; color: #F9B500;" id="a" class="btn btn-link" href="{{ route('login') }}">
                                    {{ __('Already have Account!') }}
                                </a>
                             @endif
                             </div>


					</form>
				</div><!-- col-sm-6-->	
			</div><!-- row-->	
		</div><!-- container -->
	</section>
	


@endsection