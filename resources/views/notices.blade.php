@extends('layouts.main')

@section('title')
    <title>Notices</title>
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
    </style>

@endsection

@section('content')

	                   


                    <div style="margin-top: 70px;" class="container pt-90 pb-90">
                        <div class="row">
						    <div class="col-lg-1"></div>
						    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-10">

                            @foreach ($notices as $notices)
                                						        
							    <a href="{{route('single',['id'=>$notices->post_id])}}" style="width: 100%;"><div style="border-bottom: solid 1px #8f8f8f; background: #e2e2e2;" class="bg-white p-40 psm-30">
                                    <h4 style="margin-top: -30px; color: #aaaaaa;" class="pb-15">{{$notices->created_at}}</h4>

                                @if ($notices->what)    
								    <h3 style="margin-bottom: -10px; color: #000;" class=" lh-1-2"><i style="font-size: 25px;" class=" mr-5 font-12 fa fa-thumbs-up"></i> <span style="color: #F9B500;">{{$notices->user_name}}</span> Like your post</h3>
                                @else
								    <h3 style="margin-bottom: -10px; color: #000;" class=" lh-1-2"><i style="font-size: 25px;" class=" mr-5 font-12 fa fa-comment"></i> <span style="color: #F9B500;">{{$notices->user_name}}</span> Comment on your post</h3>
                                @endif
								</div></a>

                            @endforeach






						    </div>

                            
					    </div>
                    </div>


                    

@endsection