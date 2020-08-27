@extends('layouts.main')

@section('title')
    <title>CONTACT US</title>
@endsection

@section('css')
	<link rel="icon" type="image/png" href="images/icon/contact.png"/>
@endsection

@section('content')



	<div class="slider-main h-300x h-sm-auto pos-relative pt-95 pb-25">
		<div class="img-bg bg-layer-4" style="background: url(images/contact.jpg) no-repeat center; background-size: cover;"></div>
		<div class="container-fluid h-100 mt-xs-50">
			<div class="dplay-tbl">
				<div class="dplay-tbl-cell color-white text-center">
				
					<h1 class="ptb-50"><b>CONTACT <span style="color: #F9B500;">US</span></b></h1>
					
				</div><!-- dplay-tbl-cell -->
			</div><!-- dplay-tbl -->
		</div><!-- container -->
	</div><!-- slider-main -->
	
	
	<section class="bg-1-white ptb-70 ptn-sm-50">
		<div class="container">
			<div class="row">
				<div class="col-xl-2"></div>
				<div style="margin-top: -50px;" class="col-sm-12 col-md-12 col-lg-12 col-xl-8">
					<form class="form-block form-h-55 form-plr-20 form-bg-white text-center">
						<div class="row">
							<div class="col-sm-6 mb-30">
								<input style="border: solid 1px #000;" type="text" placeholder="Name">
							</div><!-- col-sm-6-->	
							
							<div class="col-sm-6 mb-30">
								<input style="border: solid 1px #000;" type="text" placeholder="Email">
							</div><!-- col-sm-6-->
							
							<div class="col-sm-12 mb-30">
								<textarea style="border: solid 1px #000;" class="ptb-20 min-h-200x" placeholder="Comment"></textarea>
							</div><!-- col-sm-12-->
							
						</div><!-- row-->
						<button style="border: solid 1px #000;" class="btn-b-lg btn-brdr-grey plr-25 color-ash" type="submit"><b>Send Message</b></button>
						
					</form>
				</div><!-- col-sm-6-->	
			</div><!-- row-->	
		</div><!-- container -->
	</section>
	


@endsection