@extends('layouts.main')

@section('title')
    <title>Change Password</title>
@endsection

@section('css')

	<link rel="icon" type="image/png" href="{{  asset('images/icon/cp.png') }}"/>

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
		<div class="img-bg bg-layer-4" style="background: url(images/forget.png) no-repeat center; background-size: cover;"></div>
		<div class="container-fluid h-100 mt-xs-50">
			<div class="dplay-tbl">
				<div class="dplay-tbl-cell color-white text-center">
				
					<h1 class="ptb-50"><b>Change <span style="color: #F9B500;">Password</span></b></h1>
					
				</div><!-- dplay-tbl-cell -->
			</div><!-- dplay-tbl -->
		</div><!-- container -->
	</div><!-- slider-main -->
	
	
	<section class="bg-1-white ptb-70 ptn-sm-50">
		<div class="container">
			<div class="row">
				<div class="col-xl-2"></div>
				<div style="margin-top: -50px;" class="col-sm-12 col-md-12 col-lg-12 col-xl-8">

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif



					<form method="POST" action="{{ route('changePassword') }}" class="form-block form-h-55 form-plr-20 form-bg-white text-center">
                    {{ csrf_field() }}

						<div class="row">
							<div class="col-sm-12 mb-30">
								<input id="current-password" style="border: solid 1px #000;" name="current-password" type="password" placeholder="Current Password">
                                @if ($errors->has('current-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                    </span>
                                @endif
							</div><!-- col-sm-6-->	
							
							<div class="col-sm-6 mb-30">
								<input id="new-password" style="border: solid 1px #000;" name="new-password" type="password" placeholder="New Password">
                                @if ($errors->has('new-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>
                                @endif
							</div><!-- col-sm-6-->
							
							<div class="col-sm-6 mb-30">
								<input id="new-password-confirm" style="border: solid 1px #000;" name="new-password_confirmation" type="password" placeholder="Confirm New Password">
							</div><!-- col-sm-6-->
							
						</div><!-- row-->
						<button style="border: solid 1px #000;" class="btn-b-lg btn-brdr-grey plr-25 color-ash" type="submit"><b>Save Changes</b></button>
						
					</form>
				</div><!-- col-sm-6-->	
			</div><!-- row-->	
		</div><!-- container -->
	</section>
	


@endsection