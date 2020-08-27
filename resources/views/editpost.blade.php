@extends('layouts.main')

@section('title')
    <title>Post Edit</title>
@endsection

@section('css')

	<link rel="icon" type="image/png" href="{{  asset('images/icon/notices.png') }}"/>

    <style>
        .body{
            background-color: #F9B500 !important;
        }

        header{
            background: #191919;
        }
        .button:hover{
            background: #fff !important;
        }
    </style>

@endsection

@section('content')

	                   


		<div class="container">

			<div class="row pt-90">
				<div class="col-xl-2"></div>
				<div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
					<form action="  {{ route('update-post', ['id'=> $posts->id]) }} " method="post" enctype="multipart/form-data" class="form-block form-h-55 form-plr-20 form-bg-white text-center">
	                @method('PATCH')
                    @csrf

                        <div class="row" style="padding-top: 70px;">
							
							<div class="col-lg-12 col-xl-12 col-sm-12 col-md-12 pb-40">
								<textarea style="border: solid 1px #000; border-radius: 25px; padding: 20px 0px 0px 20px;" class="min-h-200x" name="title" placeholder="Your Post">{{$posts->title}}</textarea>
							</div><!-- col-sm-12-->

     @if ($errors->count())
        <div class="alert alert-danger col-lg-12 col-xl-12 col-sm-12 col-md-12" style="color: white; background: red; margin-top: -20px;">
                @foreach ($errors->all() as $error)
                    <p style="color: #fff;">{{ $error }}</p>
                @endforeach
        </div>
    @endif

							
						</div><!-- row-->
						<button style="border: solid 1px #000; margin-bottom: 90px;" class="btn-b-lg btn-brdr-grey plr-25 button color-black" type="submit"><b>Save Changes</b></button>
						
					</form>
				</div><!-- col-sm-6-->	
			</div><!-- row-->	
		</div><!-- container -->


                    

@endsection