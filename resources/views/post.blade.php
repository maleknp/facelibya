@extends('layouts.main')

@section('title')
    <title>Post</title>
@endsection

@section('css')
	<link rel="icon" type="image/png" href="{{  asset('images/icon/post.png') }}"/>

    <style>
        @media only screen and (min-width: 1200px) {
            #action_menu_btn{
				margin-right: 280px;
			}
			.action_menu{
				margin-right: 280px;
			}
		}
			.action_menu{
				margin-top: 5px;
			}

	</style>

@endsection

@section('content')
	
	<div class="slider-main h-800x h-sm-auto pos-relative pt-95 pb-25">
		<div class="img-bg bg-16 bg-layer-6"></div>

                    <div class="container">
                      
					<div class="row pt-90" style="margin-top: 50px">
						<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-30">
							<!-- SETTING IMAGE WITH bg-5 -->
							@if ($posts->img)
								<div style="background: url({{ asset(Storage::url($posts->img)) }}) no-repeat center; background-size: cover;" class="card pos-relative h-100 bg-layer-4 color-white">
							@else
								<div class="card pos-relative h-100 color-white" style="background: #f8f8f8;">
							@endif
								<div class="plr-25 ptb-15">
										<div class="sided-70x">
											<div class="s-left">
												<a href="{{route('profile',['id'=>$posts->user->id])}}"><img style="border-radius: 50%; width: 60px; height: 60px; margin-top: 5px;" src="{{ asset(Storage::url($posts->user->avatar)) }}" alt=""></a>
											</div><!-- s-left-->
												
											<div class="s-right">
											@if ($posts->img)
												<a href="{{route('profile',['id'=>$posts->user->id])}}"><p class="pt-10 color-white"><b><span style="color: #F9B500;">{{$posts->user->name}}</span><br>{{$posts->created_at}}</b></p></a>
											@else
												<a href="{{route('profile',['id'=>$posts->user->id])}}"><p class="pt-10 color-ash"><b><span style="color: #F9B500;">{{$posts->user->name}}</span><br>{{$posts->created_at}}</b></p></a>
											@endif
											</div>	



							@auth
							@if($posts->user_id == Auth::user()->id || Auth::user()->admin == 1)
							@if ($posts->img)
							<span id="action_menu_btn"><i style="color: #fff; font-size: 35px;" class="fa fa-ellipsis-v"></i></span>
							@else
							<span id="action_menu_btn"><i style="color: #000; font-size: 35px;" class="fa fa-ellipsis-v"></i></span>
							@endif
							<div class="action_menu">
								<ul>
									<a style="width: 100%;" href="{{route('edit-post',['id'=>$posts->id])}}"><li><i class="fa fa-edit"></i><span style="font-size: 18px;"> Edit Post</span></li></a>
									<form action="{{ route('delete-post',['id'=>$posts->id]) }}" method="post" style="display: inline;" id="form-d">
					                @method('DELETE')
                                    @csrf
									<li id="file" onclick="delet()" onMouseOver="this.style.color='#F9B500'" onMouseOut="this.style.color='white'"><i class="fa fa-remove"></i><span style="font-size: 18px;"> Delete Post</span></li>
									</form>
								</ul>
							</div>
							@endif
                            @endauth



										</div><!-- sided-80x-->

							@if ($posts->img)
								<h4 class="ptb-90" style="text-align: center;"><b>{{$posts->title}}</b></h4>
							@else
								<h4 class="pt-20 color-black" style="text-align: center;">{{$posts->title}}</h4>
							@endif

                 @if ($posts->count2)
                    <div style="margin-top: 20px; margin-bottom: 0px;" class="entry-content">
					@if ($posts->img)
                        <p style="color: #fff;">{{ $posts->count2 }} People Liked This</p>
					@else
                        <p style="color: #afafaf;">{{ $posts->count2 }} People Liked This</p>
					@endif
                    </div><!-- .entry-content --></a>
				 @endif

									<ul class="list-li-mr-10 color-grey">
						                <li>
										@auth
					                    <div class="post" data-postid="{{ $posts->id }}">
						                <div class="interaction">
						                    @if (Auth::user()->likes()->where('post_id', $posts->id)->first())
        				                		<a href="#" style="background: rgba(0, 0, 0, 0); border: none; font-size: 20px; color: #F9B500;" class="btn like  pl-10 fa fa-heart">{{ Auth::user()->likes()->where('post_id', $posts->id)->first() ? Auth::user()->likes()->where('post_id', $posts->id)->first()->like == 1 ? ' Liked' : ' Like' : ' Like'  }}</a>
                                        	@else
        				                		<a href="#" style="background: rgba(0, 0, 0, 0); border: none;  font-size: 20px; color: #888888;" class="btn like pl-10 fa fa-heart">{{ Auth::user()->likes()->where('post_id', $posts->id)->first() ? Auth::user()->likes()->where('post_id', $posts->id)->first()->like == 1 ? ' Liked' : ' Like' : ' Like'  }}</a>
						                	@endif
						                </div>
						                </div>
										@else
											@if ($posts->img)
        				                		<a href="#" style="background: rgba(0, 0, 0, 0); border: none;  font-size: 20px; color: #F9B500;" class="pt-10 fa fa-heart">{{$posts->count2}}</a>
										    @else
        				                		<a href="#" style="background: rgba(0, 0, 0, 0); border: none;  font-size: 20px; color: #888888;" class="pt-10 fa fa-heart">{{$posts->count2}}</a>
											@endif
										@endauth
						                </li>
									</ul>
								</div><!-- hot-news -->
							</div><!-- card -->
						</div><!-- col-lg-4 col-md-6 -->
                    </div>
                    </div>


	</div><!-- slider-main -->
	
	
	<section class="bg-1-white ptb-0">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-1"></div>
				<div class="col-md-12 col-lg-8 ptb-50 pr-30 pr-md-15">
					
					

				@guest

					<h4 class="mb-15 mt-0 clearfix"><b>You must be <span style="color: #F9B500;">Logged in</span> to comment</b></h4>
					
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

					
					<h4 class="mb-30 mt-20 clearfix"><b>Post <span style="color: #F9B500;">Comment</span></b></h4>
					
					<div class="row">
						<div class="col-sm-12 col-md-12 col-lg-12 col-xl-8">
							<form  action="{{ route('comment',['id'=>$posts->id]) }}" method="post" class="form-block form-h-55 form-plr-20 form-bg-white">
							@csrf

								<div class="row">

									<div class="col-sm-12 mb-10">
										<textarea name="comment" class="ptb-20 min-h-150x" placeholder="Comment"></textarea>
									</div><!-- col-sm-12-->

	<div class="row">	
     @if ($errors->count())
        <div class="alert alert-danger col-sm-12 mt-0 ml-30" style="background: #F9B500; margin-bottom: 10px; ">
                @foreach ($errors->all() as $error)
                    <p style="color: #fff;">{{ $error }}</p>
                @endforeach
        </div>
    @endif
    </div>

								</div><!-- row-->
								<button class="btn-b-lg btn-brdr-grey plr-25 color-ash" type="submit"><b>Post Comment</b></button>
								
							</form>
						</div><!-- col-sm-6-->	
					</div><!-- row-->	
					
					@endguest

					<h4 class="mb-30 mt-50 clearfix"><b>Comments(<span style="color: #F9B500;">{{$posts->count}}</span>)</b></h4>
					
					
					@foreach ($comment as $comment)
						
					<div class="row">
						<div class="colsm-12 col-md-12 col-lg-12 col-xl-8 pb-30">
							<div class="p-30 bg-white">
								<div class="row">
									<div class="col-9 col-lg-9 col-xl-6">
										

										<div class="sided-70x">
											<div class="s-left">
												<a href="{{route('profile',['id'=>$comment->user->id])}}"><img style="border-radius: 50%; width: 60px; height: 60px;" src="{{ asset(Storage::url($comment->user->avatar)) }}" alt=""></a>
											</div><!-- s-left-->
												
											<div class="s-right">
												<a href="{{route('profile',['id'=>$comment->user->id])}}"><p class="ptb-5 color-ash"><b><span style="color: #000;">{{$comment->user->name}}</span><br>{{$comment->created_at}}</b></p></a>
											</div>
										</div><!-- sided-80x-->

									</div><!-- col-md-6-->
									
								</div><!-- row-->
					        
							@auth
							@if (Auth::user()->id == $posts->user_id || $comment->user_id == Auth::user()->id)
							    <form action="{{ route('delete-comment',['id'=>$comment->id]) }}" method="post" style="display: inline;" id="form-comment">
					            @method('DELETE')
                                @csrf
						    		<button type="submit"><span id="action_menu_btn"><i style="color: red; font-size: 30px;" class="fa fa-remove pr-40 pt-30"></i></span></button>
								</form>
                    		@endif
							@endauth

								<p class="mt-20">{{$comment->comment}}</p>

                        @auth
					    <div class="comment" data-commentid="{{ $comment->id }}">
						<div class="interaction">
						    @if (Auth::user()->Comlikes()->where('comment_id', $comment->id)->first())
        						<a href="#" style="background: rgba(0, 0, 0, 0); border: none; font-size: 18px; color: #F9B500;" class="btn like  pl-10 fa fa-heart">{{ Auth::user()->Comlikes()->where('comment_id', $comment->id)->first() ? Auth::user()->Comlikes()->where('comment_id', $comment->id)->first()->like == 1 ? ' Liked' : ' Like' : ' Like'  }}</a>
                        	@else
        						<a href="#" style="background: rgba(0, 0, 0, 0); border: none;  font-size: 18px; color: #afafaf;" class="btn like pl-10 fa fa-heart">{{ Auth::user()->Comlikes()->where('comment_id', $comment->id)->first() ? Auth::user()->Comlikes()->where('comment_id', $comment->id)->first()->like == 1 ? ' Liked' : ' Like' : ' Like'  }}</a>
							@endif
						</div>
						</div>
						@else
        						<a href="#" style="background: rgba(0, 0, 0, 0); border: none;  font-size: 18px; color: #afafaf;" class="pt-10 fa fa-heart">{{$comment->count}}</a>
						@endauth
							</div><!-- p-30-->	
						</div><!-- col-sm-6-->	
					</div><!-- row-->

					@endforeach
					
				</div><!-- col-sm-9 -->
				
				<div class="col-md-12 col-lg-3 bg-2-white ptb-50 pl-30 pl-md-15">
					<div class="row">
						<div class="col-md-12 col-lg-8">
							<div class="mx-w-md-400x mlr-md-auto">
							
								<div class="mb-50">
									<h5 class="mb-30"><b>People <span style="color: #F9B500;">likeed</span> this post</b></h5>


									@foreach ($posts->likes as $like)
										
									
									<div class="sided-80x mb-20">
										<div class="s-left">
											<a href="{{route('profile',['id'=>$like->user->id])}}"><img style="border-radius: 50%; width: 78px; height: 78px;" src="{{ asset(Storage::url($like->user->avatar)) }}" alt=""></a>
										</div><!-- s-left -->
										<div style="padding-top: 20px;" class="s-right">
											<h5 class="pt-5"><a href="{{route('profile',['id'=>$like->user->id])}}"><b>{{$like->user->name}}</b></a></h5>
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
        function myFunction(){
			    document.getElementById("form-comment").submit();
		}

		        function delet(){
			    document.getElementById("form-d").submit();
		}
	</script>

	@endsection