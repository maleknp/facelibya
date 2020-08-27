@extends('layouts.main')

@section('title')
    <title>Members</title>
@endsection

@section('css')

	<link href="{{ asset('member/css/styles.css') }}" rel="stylesheet">

@endsection

@section('content')



	<div class="slider-main h-300x h-sm-auto pos-relative pt-95 pb-25">
		<div style="background: url(images/members2.png) no-repeat center;" class="img-bg bg-1 bg-layer-4"></div>
		<div class="container-fluid h-100 mt-xs-50">
			<div class="dplay-tbl">
				<div class="dplay-tbl-cell color-white text-center">

				
					<h1 class="ptb-50"><b>{{$name}}</span></b></h1>


					
				</div><!-- dplay-tbl-cell -->
			</div><!-- dplay-tbl -->
		</div><!-- container -->
	</div><!-- slider-main -->
	
	

	<section class="blog-area section">
		<div class="container">

			<div class="row">
  

                    @if (!$users->count())
                    <div class="col-lg-12 col-md-12">
                        <h3 class="text-center" style="color: #000; text-align: center; font-size: 27px;">There is no member with name <span style="color: #F9B500;">{{$name}}</span></h3>
                    </div>
                    @endif

             				   
			   @foreach ($users as $user)
				   
				<div class="col-lg-4 col-md-6">
					<div class="card h-90">
						<div class="single-post post-style-1">
					<a href="{{ route('profile',['id'=>$user->id]) }}">
							<div style="margin-top: -50px;" class="blog-image"><img height="220" src="{{ asset(Storage::url($user->cover)) }}" alt="Blog Image"></div>

							<a class="avatar" href="{{ route('profile',['id'=>$user->id]) }}"><img src="{{ asset(Storage::url($user->avatar)) }}" alt="Profile Image"></a>

							<h2 class="title"><a href="{{ route('profile',['id'=>$user->id]) }}"><b>{{$user->name}}</b></a></h2>

                            <p style="margin-top: -20px; padding-bottom: 20px;">{{$user->bio}}</p>
                          </a>

						</div><!-- single-post -->
					</div><!-- card -->	
				</div><!-- col-lg-4 col-md-6 -->

                @endforeach

			</div><!-- row -->

		</div><!-- container -->
	</section><!-- section -->

	


@endsection