@extends('layouts.main')

@section('title')
    <title>Reset Password</title>
@endsection

@section('css')
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
		<div class="img-bg bg-layer-4" style="background: url({{ asset('images/forget.png') }}) no-repeat center; background-size: cover;"></div>
		<div class="container-fluid h-100 mt-xs-50">
			<div class="dplay-tbl">
				<div class="dplay-tbl-cell color-white text-center">
				
					<h1 class="ptb-50"><b>Reset <span style="color: #F9B500;">Password</span></b></h1>
					
				</div><!-- dplay-tbl-cell -->
			</div><!-- dplay-tbl -->
		</div><!-- container -->
	</div><!-- slider-main -->
	
	
	<section class="bg-1-white ptb-70 ptn-sm-50">
		<div class="container">
			<div class="row">
				<div class="col-xl-2"></div>
				<div style="margin-top: -50px;" class="col-sm-12 col-md-12 col-lg-12 col-xl-8">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

					<form class="form-block form-h-55 form-plr-20 form-bg-white text-center" method="POST" action="{{ route('password.email') }}">
                        @csrf

						<div class="row">
							<div class="col-sm-12 mb-30">
                                <input style="border: solid 1px #000;" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="E-mail">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror							
                            </div><!-- col-sm-6-->	

							
							
						</div><!-- row-->
						<button style="border: solid 1px #000;" class="btn-b-lg btn-brdr-grey plr-25 color-ash" type="submit"><b>Send Password Reset Link</b></button>
						
					</form>
				</div><!-- col-sm-6-->	
			</div><!-- row-->	
		</div><!-- container -->
	</section>
	


@endsection