@extends('layouts.main')

@section('title')
    <title>{{$users->name}} Profile</title>
@endsection



@section('css')

	<link rel="icon" type="image/png" href="{{  asset('images/icon/profile.png') }}"/>

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
                        </div><!-- .swiper-slide -->

                    </div><!-- .swiper-wrapper -->

                    <!-- Add Pagination -->

                    <!-- Add Arrows -->

                </div><!-- .swiper-container -->
            </div><!-- .col -->
        </div><!-- .row -->

        <div class="container">
            <div class="row">
                <div class="offset-lg-9 col-12 col-lg-3">
                    <a href="#">
                        <div class="yt-subscribe">
                            <img style="border-radius: 50%;" src="{{ asset(Storage::url($users->avatar)) }}" alt="Youtube Subscribe">
                            <h3>{{ $users->name }}</h3>
                            @if($users->bio)
                            <p>{{$users->bio}}</p>
                            @else
                            <p>>Bio<</p>
                            @endif
                        </div><!-- .yt-subscribe -->
                    </a>
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->

    <div class="container single-page">
        <div class="row">
        
            <div class="col-12 col-lg-9">
                <div class="content-wrap">
                <div class="row">
                    <header class="entry-header pt-10">

                        <h3 style="font-size: 35px;" class="entry-title"><span style="color: #F9B500;">{{ $users->name }}'s</span> Posts</h3>
                    </header><!-- .entry-header -->
                </div>

                         @if (session('success'))
                            <div class="alert alert-success">
                                <p style="font-size: 18px;">{{ session('success') }}</p>
                            </div>
                        @endif

                    <figure class="featured-image">

        @if($count)
        @foreach ($posts as $post)
					<div class="row">
						<div  class="colsm-12 col-md-12 col-lg-12 col-xl-8">
						@if($post->img)
							<div  class="pb-15">
						@else
							<div style="margin-bottom: -20px;">
						@endif
								<div style="background: #f8f8f8;" class="row">
									<div  class="col-9 col-lg-9 col-xl-6">
										


										<div  class="sided-70x">

											<div class="s-left">
												<a href="{{route('profile',['id'=>$post->user->id])}}"><img style="border-radius: 50%; width: 60px; height: 60px; margin-top: 5px;" src="{{ asset(Storage::url($post->user->avatar)) }}" alt=""></a>
											</div><!-- s-left-->
											<div class="s-right">
                                            <div class="row">
												<a  href="{{route('profile',['id'=>$post->user->id])}}"><p style="float: left;" class="pt-10 pl-10 color-ash"><b><span style="color: #000; float: left;">{{ $post->user->name }}</span> <br> {{ $post->created_at }}</b></p></a>
											</div>

                                            </div>


										</div><!-- sided-80x-->

									</div><!-- col-md-6-->

								</div><!-- row-->
				
							@auth
							@if($post->user_id == Auth::user()->id || Auth::user()->admin == 1)
							<span id="action_menu_btn"><i style="color: #000; font-size: 30px;" class="fa fa-ellipsis-v pr-10 pt-10"></i></span>
							<div class="action_menu mr-10 mt-10">
								<ul>
									<a style="width: 100%; text-align: left;" href="{{route('edit-post',['id'=>$post->id])}}"><li><i class="fa fa-edit"></i> Edit Post</li></a>
									<form action="{{ route('delete-post',['id'=>$post->id]) }}" method="post" style="display: inline;" id="form-post">
					                @method('DELETE')
                                    @csrf
									<button type="submit" style="width: 100%; text-align: left;"><li id="file"><i class="fa fa-remove"></i> Delete Post</li></button>
									</form>
								</ul>
							</div>
							@endif
                            @endauth

							</div><!-- p-30-->	
						</div><!-- col-sm-6-->	

					</div><!-- row-->
                    
					@if($post->img)
                    	<a href="{{route('single',['id'=>$post->id])}}" style="width: 100%;">
                        <img style="margin-bottom: -30px;" class="mymy" src="{{ asset(Storage::url($post->img)) }}" height="500" alt="">
                    </figure><!-- .featured-image --></a>
                    @endif
	                <a style="width: 100%;" href="{{route('single',['id'=>$post->id])}}">
                    <div class="entry-content">
                        <p style="text-align: center !important; font-size: 18px;">{{ $post->title }}</p>
                    </div><!-- .entry-content --></a>

                 @if ($post->count2)
                    <div style="margin-top: 0px; margin-bottom: -10px;" class="entry-content">
                        <a style="width: 100%;" href="{{route('single',['id'=>$post->id])}}"><p style="color: #afafaf;">{{ $post->count2 }} People Liked This</p></a>
                    </div><!-- .entry-content --></a>
				 @endif

					@guest
                    <footer style="margin-top: 10px; padding-bottom: 50px;" class="entry-footer flex flex-column flex-lg-row justify-content-between align-content-start align-lg-items-center">
                        <ul class="post-share flex align-items-center order-3 order-lg-1">
					<h5 style="font-size: 16px;" class="mb-15 mt-0 clearfix"><b>You must be <span style="color: #F9B500;">Logged in</span> to interact</b></h5>
                        </ul><!-- .post-share -->
                    </footer><!-- .entry-footer -->
					@else

                    <footer style="margin-top: 10px; padding-bottom: 50px;" class="entry-footer flex flex-column flex-lg-row justify-content-between align-content-start align-lg-items-center">
                        <ul class="post-share flex align-items-center order-3 order-lg-1">
                            {{-- <li><a href="#"><i style="font-size: 18px;" class="fa fa-heart"></i></a></li> --}}
					    <div class="post" data-postid="{{ $post->id }}">
						<div class="interaction">
						    @if (Auth::user()->likes()->where('post_id', $post->id)->first())
        						<a href="#" style="background: rgba(0, 0, 0, 0); border: none; font-size: 18px; color: #F9B500;" class="btn like  pl-10 fa fa-heart">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 1 ? ' Liked' : ' Like' : ' Like'  }}</a>
                        	@else
        						<a href="#" style="background: rgba(0, 0, 0, 0); border: none;  font-size: 18px; color: #afafaf;" class="btn like pl-10 fa fa-heart">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 1 ? ' Liked' : ' Like' : ' Like'  }}</a>
							@endif
						</div>
						</div>
					    </ul><!-- .post-share -->
                        

                        <div class="comments-count order-1 order-lg-3 pr-15">
						@if ($post->count)
                            <a style="font-size: 18px;" href="{{route('single',['id'=>$post->id])}}"><i style="font-size: 18px;" class="fa fa-comment"></i> {{ $post->count }} Comments</a>
						@else
                            <a style="font-size: 18px;" href="{{route('single',['id'=>$post->id])}}"><i style="font-size: 18px;" class="fa fa-comment"></i> Comments</a>
						@endif
                        </div><!-- .comments-count -->
                    </footer><!-- .entry-footer -->
                    
					@endguest
        @endforeach
        @else
                <h3 style="font-size: 35px;" class="entry-title"><span style="color: #F9B500;">No</span> Posts until now <i style="color: #F9B500;" class="fa fa-frown-o"></i></h3>
        @endif



                </div><!-- .content-wrap -->

            </div><!-- .col -->



            <div class="col-12 col-lg-3">
                <div class="sidebar">
                    @if ($users->about)
                   <div class="about-me">
                        <h2>About <span style="color: #F9B500;">{{ $users->name }}</span></h2>

                        <p>{{$users->about}}</p>
                    </div><!-- .about-me -->
                    @endif
                    
                    <div class="tags-list">
                        @if($count2)
                        <h2 style="padding-bottom: 10px; text-align: center;">Interests</h2>
                        @endif
                            @auth
                            @if ($users->id == Auth::user()->id)
                                <form action="{{ route('interests') }}" method="post" class="row">
                                @csrf
                                
                                  <div class="mb-15 col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                    <input type="text" class="form-control" name="interest" placeholder="what you love!">
                                  </div>
                                
                                
                                
                                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                  <button style="background: rgba(0, 0, 0, 0); border: solid 1px #F9B500; color: #F9B500;" type="submit" class="btn xz btn-primary mb-2">Add</button>
                                  </div>
                                
                                    <div class="row">
                                     @if ($errors->count())
                                        <div class="alert alert-danger col-sm-12 mb-15 ml-30" style="background: #F9B500; margin-bottom: 0px; ">
                                                @foreach ($errors->all() as $error)
                                                    <p style="color: #fff;">{{ $error }}</p>
                                                @endforeach
                                        </div>
                                    @endif
                                	</div>
                                </form>
                            @endif
                            @endauth


                    @foreach ($int as $int)
                        <a style="color: white;">{{$int->int}}</a>
                    @endforeach

                    </div><!-- .tags-list -->

                    <div class="sidebar-ads">
                        <h2 style="padding-bottom: 30px; text-align: center;"><span style="color: #F9B500;">{{ $users->name }}'s</span> Images</h2>
                            <div class="card-group">
                            @foreach ($image as $img)
                              <div class="col-lg-6 col-md-6 col-sm-12 pt-10 pb-10">
                              <img class="card-img-top" height="100" src="{{ asset(Storage::url($img->img)) }}" alt="Card image cap">
                              </div>
                            @endforeach
                            </div>
                    </div>


                    </div>
                </div><!-- .sidebar -->
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->

@endsection


@section('js')

<script type='text/javascript' src='{{  asset('profile/js/jquery.js') }}'></script>
<script type='text/javascript' src='{{  asset('profile/js/swiper.min.js') }}'></script>
<script type='text/javascript' src='{{  asset('profile/js/custom.js') }}'></script>

@endsection