@extends('layouts.main')

@section('title')
    <title>Home</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{  asset('profile/css/style.css') }}">

	<link rel="icon" type="image/png" href="images/icon/iconhomeyellow.png"/>

    <style>
        #file:hover{
			color: #F9B500;
		}
	</style>
   
@endsection

@section('content')
	<div class="slider-main h-800x h-sm-auto pos-relative pt-95 pb-25">
		<div class="img-bg bg-layer-4" style="background: url(images/back6.png) no-repeat center; background-size: cover;"></div>
		<div class="container-fluid h-100 mt-xs-50">
		
			<div class="row h-100">
				<div class="col-md-1"></div>
				<div class="col-sm-12 col-md-5 h-100 h-sm-50">
					<div class="dplay-tbl">
						<div class="dplay-tbl-cell color-white mtb-30">
							<div class="mx-w-400x">

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif


						

							
							   @guest
								     <h5><b>WELCOME <span style="color: #F9B500;">Guest</span></b></h5>
								@else
								      <h5><b>WELCOME <span style="color: #F9B500;">{{ Auth::user()->name }}</span></b></h5>
								@endguest
								@guest
								    <h1 class="mt-20 mb-30"><b>Join Now To Our Community <span style="color: #F9B500;">Face</span>Libya</b></h1>
								@else
								    <h1 class="mt-20 mb-30"><b>We Are Glad You Have Joined Our <span style="color: #F9B500;">Community</span></b></h1>
								@endguest
								@guest
								<h6><a class="plr-20 btn-brdr-grey color-white" href="{{ route('register') }}"><b>Signup Now</b></a></h6>
								@else
								<h6><a class="plr-20 btn-brdr-grey color-white" href="{{route('contact')}}"><b>Contact us</b></a></h6>
								@endguest
							</div><!-- mx-w-200x -->
						</div><!-- dplay-tbl-cell -->
					</div><!-- dplay-tbl -->
				</div><!-- col-sm-6 -->
				
				<div class="col-sm-12 col-md-6 h-sm-50 oflow-hidden swiper-area pos-relative">			
	
					<div class="abs-blr pos-sm-static">
						<div class="row pos-relative mt-50 all-scroll">
						
							<div class="swiper-scrollbar resp"></div>
							<div class="col-md-10">

								<h5 class="mb-50 color-white"><b>HOT POSTS</b></h5>
								
								<div class="swiper-container oflow-visible" data-slide-effect="slide" data-autoheight="false" 
									data-swiper-speed="500" data-swiper-margin="25" data-swiper-slides-per-view="2"
									data-swiper-breakpoints="true" data-scrollbar="true" data-swiper-loop="true"
									data-swpr-responsive="[1, 2, 1, 2]">
									
									
								   
									<div class="swiper-wrapper">
										<!-- data-swiper-autoplay="1000"  --> 

                                    @foreach ($best as $be)
										<div class="swiper-slide">
											<div class="bg-white">
                                               @if ($be->img)
												<a style="width: 100%;" href="{{route('single',['id'=>$be->id])}}"><img src="{{ asset(Storage::url($be->img)) }}" height="158px" alt=""></a>
											   @endif
												<div class="plr-25 ptb-15">
												    @if ($be->img)
													    <a href="{{route('profile',['id'=>$be->user->id])}}"><h5 class="color-ash pl-0"><img src="{{ asset(Storage::url($be->user->avatar)) }}" style="width: 32px; height: 32px; position: absolute; top:168px; border-radius: 50%;"><b class="pl-40">{{$be->user->name}}</b></h5></a>
													@else
													    <a href="{{route('profile',['id'=>$be->user->id])}}"><h5 class="color-ash pl-0"><h5 class="color-ash pl-0"><img src="{{ asset(Storage::url($be->user->avatar)) }}" style="width: 32px; height: 32px; position: absolute; top:10px; border-radius: 50%;"><b class="pl-40">{{$be->user->name}}</b></h5></a>
													@endif
													<h4 style="font-size: 14px;" class="mtb-10">
														<a href="{{route('single',['id'=>$be->id])}}" style="width: 100%; text-align: center;">{{$be->title}}</a></h4>
													<ul class="list-li-mr-10 color-lt-black">
                 @auth
                 @if ($be->count2)
                    <div class="entry-content">
                        <a href="{{route('single',['id'=>$be->id])}}"><p style="color: #afafaf;">{{ $be->count2 }} People Liked This</p></a>
                    </div><!-- .entry-content --></a>
				 @endif
				 @endauth

													
											@auth		
					                        <li><div class="post" data-postid="{{ $be->id }}">
						                    <div class="interaction">
						                        @if (Auth::user()->likes()->where('post_id', $be->id)->first())
        				                    		<a href="#" style="background: rgba(0, 0, 0, 0); border: none; font-size: 18px; color: #F9B500;" class="btn like fa fa-heart">{{ Auth::user()->likes()->where('post_id', $be->id)->first() ? Auth::user()->likes()->where('post_id', $be->id)->first()->like == 1 ? ' Liked' : ' Like' : ' Like'  }}</a>
                                            	@else
        				                    		<a href="#" style="background: rgba(0, 0, 0, 0); border: none;  font-size: 18px; color: #888888;" class="btn like fa fa-heart">{{ Auth::user()->likes()->where('post_id', $be->id)->first() ? Auth::user()->likes()->where('post_id', $be->id)->first()->like == 1 ? ' Liked' : ' Like' : ' Like'  }}</a>
						                    	@endif
						                    </div>
						                    </div></li>
											@else
											    @if ($be->count2)
        				                    		<a style="background: rgba(0, 0, 0, 0); border: none;  font-size: 18px; color: #888888;" class="mr-5 font-12 fa fa-heart pt-10"><span style="font-size: 15px;">{{$be->count2}}</span></a>
												@else
        				                    		<a style="background: rgba(0, 0, 0, 0); border: none;  font-size: 18px; color: #888888;" class="fa fa-heart pt-10"></a>
												@endif
											@endauth

											    @if ($be->count)
													<a style="font-size: 18px; float: right; padding-top: 6px;" href="{{route('single',['id'=>$be->id])}}"><li><i class="mr-5 font-12 fa fa-comment"></i><span style="font-size: 15px;">{{$be->count}}</span></li></a>
												@else
													<a style="font-size: 18px; float: right; padding-top: 6px;" href="{{route('single',['id'=>$be->id])}}"><li><i class="mr-5 font-12 fa fa-comment"></i></li></a>
												@endif
													</ul>
												</div><!-- hot-news -->
											</div><!-- hot-news -->
										</div><!-- swiper-slide -->
									@endforeach
										
										
									</div><!-- swiper-wrapper -->
								</div><!-- swiper-container -->
								
							</div><!-- col-sm-6 -->
						</div><!-- all-scroll -->
					</div><!-- row -->
				</div><!-- col-sm-6 -->
				
			</div><!-- row -->
		</div><!-- container -->
	</div><!-- slider-main -->

	
	
	
	<section class="bg-1-white ptb-0">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-1"></div>
				<div class="col-md-12 col-lg-8 ptb-50 pr-30 pr-md-15">

				@guest

					<h4 class="mb-15 mt-0 clearfix"><b>You must be <a href="{{route('login')}}" style="color: #F9B500;">Logged in</a> to post</b></h4>
					
					<div class="row">
						<div class="col-sm-12 col-md-12 col-lg-12 col-xl-8">
							<form action="{{ route('login') }}" class="form-block form-h-55 form-plr-20 form-bg-white">
								<div class="row">
									
								</div><!-- row-->
								<button class="btn-b-lg btn-brdr-grey plr-25 color-ash mb-20" type="submit"><b>Signin</b></button>
								
							</form>
						</div><!-- col-sm-6-->	
					</div><!-- row-->	

				@else

					<h4 class="mb-15 mt-0 clearfix"><b>What are you <span style="color: #F9B500;">thinking?</span></b></h4>
					
					<div class="row">
						<div class="col-sm-12 col-md-12 col-lg-12 col-xl-8">
							<form action="{{ route('post1') }}" method="post" enctype="multipart/form-data" class="form-block form-h-55 form-plr-20 form-bg-white">
							@csrf

								<div class="row">

									<div class="col-sm-12">
										<textarea name="title" class="ptb-20 min-h-150x" placeholder="Post"></textarea>
									</div><!-- col-sm-12-->

    <div class="row">
     @if ($errors->count())
        <div class="alert alert-danger col-sm-12 mt-10 ml-30" style="background: #F9B500; margin-bottom: 0px; ">
                @foreach ($errors->all() as $error)
                    <p style="color: #fff;">{{ $error }}</p>
                @endforeach
        </div>
    @endif
	</div>


									<div class="col-sm-12 mb-20">
										<input style="background: #f8f8f8; border: 0px;" name="img" class="ptb-10" type="file" placeholder="image">
									</div><!-- col-sm-12-->
									
								</div><!-- row-->
								<button class="btn-b-lg btn-brdr-grey plr-25 color-ash mb-20" type="submit"><b>Spread</b></button>
								
							</form>
						</div><!-- col-sm-6-->	
					</div><!-- row-->	

                @endguest

					<div class="row">
					
					
						<!-- END OF FIRST PARA -->
					</div><!-- row -->
					
					<h4 style="font-size: 23px;" class="mb-30 mt-20 clearfix"><b>New <span style="color: #F9B500;">Posts</span></b></h4>
					

            <div class="col-12 col-lg-10">
                <div class="content-wrap">

                    <figure class="featured-image">



             @foreach ($posts as $post)
					<div class="row">
						<div  class="colsm-12 col-md-12 col-lg-12 col-xl-8">
						@if($post->img)
							<div  class="pb-15">
						@else
							<div>
						@endif
								<div style="background: #f8f8f8;" class="row">
									<div  class="col-9 col-lg-9 col-xl-6">
										
										<div  class="sided-70x">

											<div class="s-left">
												<a  href="{{route('profile',['id'=>$post->user->id])}}"><img style="border-radius: 50%; width: 60px; height: 60px; margin-top: 5px;" src="{{ asset(Storage::url($post->user->avatar)) }}" alt=""></a>
											</div><!-- s-left-->
											<div class="s-right">
												<a href="{{route('profile',['id'=>$post->user->id])}}"><p class="pt-10 color-ash"><b><span style="color: #000;">{{ $post->user->name }}</span> <br> {{ $post->created_at }}</b></p></a>
											</div>
										</div><!-- sided-80x-->
									</div><!-- col-md-6-->
									
								</div><!-- row-->

                            
							@auth
							@if($post->user_id == Auth::user()->id || Auth::user()->admin == 1)
							<span id="action_menu_btn"><i style="color: #000; font-size: 30px;" class="fa fa-ellipsis-v pr-10 pt-10"></i></span>
							<div class="action_menu mr-10 mt-10">
								<ul>
									<a style="width: 100%;" href="{{route('edit-post',['id'=>$post->id])}}"><li><i class="fa fa-edit"></i> Edit Post</li></a>
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
                    <div class="">
                        <p style="text-align: center; font-size: 18px;" class="pt-40">{{ $post->title }}</p>
                    </div><!-- .entry-content --></a>

                 @if ($post->count2)
                    <div style="margin-top: 20px; margin-bottom: 0px;" class="entry-content">
                        <a href="{{route('single',['id'=>$post->id])}}"><p style="color: #afafaf;">{{ $post->count2 }} People Liked This</p></a>
                    </div><!-- .entry-content --></a>
				 @endif

					@guest
                    <footer style="margin-top: 10px; padding-bottom: 50px;" class="entry-footer flex flex-column flex-lg-row justify-content-between align-content-start align-lg-items-center">
                        <ul class="post-share flex align-items-center order-3 order-lg-1">
					<h5 style="font-size: 16px;" class="mb-15 mt-0 clearfix"><b>You must be <a href="{{route('login')}}" style="color: #F9B500;">Logged in</a> to interact</b></h5>
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
        						<a href="#" style="background: rgba(0, 0, 0, 0); border: none;  font-size: 18px; color: #888888;" class="btn like pl-10 fa fa-heart">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 1 ? ' Liked' : ' Like' : ' Like'  }}</a>
							@endif
						</div>
						</div>
					    </ul><!-- .post-share -->
                        

                        <div class="comments-count order-1 order-lg-3 pt-5">
						@if ($post->count)
                            <a style="font-size: 18px; color: #888888;" onMouseOver="this.style.color='#F9B500'" onMouseOut="this.style.color='#888888'" href="{{route('single',['id'=>$post->id])}}"><i style="font-size: 18px;" class="fa fa-comment"></i> {{ $post->count }} Comments</a>
						@else
                            <a style="font-size: 18px; color: #888888;" onMouseOver="this.style.color='#F9B500'" onMouseOut="this.style.color='#888888'" href="{{route('single',['id'=>$post->id])}}"><i style="font-size: 18px;" class="fa fa-comment"></i> Comments</a>
						@endif
                        </div><!-- .comments-count -->
                    </footer><!-- .entry-footer -->
                    
					@endguest

            @endforeach




                </div><!-- .content-wrap -->
            </div><!-- .col -->

					


				</div><!-- col-sm-9 -->
				
				<div class="col-md-12 col-lg-3 bg-2-white ptb-50 pl-30 pl-md-15">
					<div class="row">
						<div class="col-md-12 col-lg-8">
							<div class="mx-w-md-400x mlr-md-auto">
							
								<div class="mb-50">
									<h5 class="mb-30"><b>Admins</b></h5>

									@foreach ($admin as $admin)
									<div class="sided-80x mb-20">
										<div class="s-left">
											<a href="{{route('profile',['id'=>$admin->id])}}"><img style="border-radius: 50%; width: 78px; height: 78px;" src="{{ asset(Storage::url($admin->avatar)) }}" alt=""></a>
										</div><!-- s-left -->
										<div style="padding-top: 20px;" class="s-right">
											<h5 class="pt-5"><a href="{{route('profile',['id'=>$admin->id])}}"><b>{{$admin->name}}</b></a></h5>
										</div><!-- s-left -->
									</div><!-- sided-80x -->
									
									@endforeach
								
<a class="mb-50 pos-relative dplay-block" href="#">
								
									<img src="images/sidebar_1_400X300.jpg" alt="">
									<div class="abs-tblr z-10 bg-layer-4">
									
										<div class="dplay-tbl text-center color-white">
											<div class="dplay-tbl-cell">
												<h3><b>CHARITY</b></h3>
												<h4><b>tournament</b></h4>
											</div>
										</div><!-- dplay-tbl -->
									</div><!-- abs-tblr -->
								</a><!-- mb-50 -->
								
								<div class="mb-0">
									<h5 class="mb-30"><b>People you may know</b></h5>
									
									@foreach ($f as $f)
									<div class="sided-80x mb-20">
										<div class="s-left">
											<a href="{{route('profile',['id'=>$f->id])}}"><img style="border-radius: 50%; width: 78px; height: 78px;" src="{{ asset(Storage::url($f->avatar)) }}" alt=""></a>
										</div><!-- s-left -->
										<div style="padding-top: 20px;" class="s-right">
											<h5 class="pt-5"><a href="{{route('profile',['id'=>$f->id])}}"><b>{{$f->name}}</b></a></h5>
										</div><!-- s-left -->
									</div><!-- sided-80x -->
									
									@endforeach
									

								</div><!-- mb-50 -->
								
							</div><!-- mx-w-400 -->
						</div><!-- col-sm-9 -->
					</div><!-- row -->
				</div><!-- col-sm-3 -->
			</div><!-- row -->
		</div><!-- container -->
	</section>

    @endsection
	
	@section('js')

<script>
document.getElementById("file").onclick = function() {

    document.getElementById("form").submit();
};

</script>

	@endsection

	