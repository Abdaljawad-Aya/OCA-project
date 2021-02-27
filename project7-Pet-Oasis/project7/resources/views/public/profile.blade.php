@extends('public.layout.layout')

@section('content')

<div id="class" class="">
		<div class="content-wrap">
			<div class="container">

				<div class="row">
					
					<!-- Item 1 -->
					<div class="col-12 col-sm-6 col-md-4">
						<div class="rs-team-1 mb-5">
							<div class="media">
								<img src="/uploads/image/{{  Auth::user()->user_image }}" alt="user image" class="img-fluid">
								<div class="sosmed-icon">
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-twitter"></i></a>
									<a href="#"><i class="fa fa-google-plus"></i></a>
           
								</div>

                                
                              
							</div>
							<div class="body">
								<div class="title"> {{ Auth::user()->user_name}}</div>
                                <form enctype="multipart/form-data" action="/profile" method="POST" >
                                   @csrf
                                       <div class="text-primary">Update Profile image </div>
                                       <div class="form-group row p-2 d-flex m-0 col-12 justify-content-around">
                                       <div style="cursor: pointer;"  class="btn btn-primary col-5">
                                      
                                       <span  style="position: absolute; top:50% ; transform:translateY(-50%) ; cursor: pointer;">select file</span>
                                       <input type="file" name="user_image"  class="custom-file-input"  >
                                       </div>

                                        <input type="submit" class="btn btn-primary col-5">
                                       </div>
                                             </form>
							</div>
                            
              
            
						</div>
					</div>

					<div class="col-12 col-sm-6 col-md-8">
						<h3 class="text-secondary mb-1">{{ Auth::user()->user_name}}</h3>
						<p class="text-primary">Veterinary</p>
						<p class="lead text-black">We are pets clinic dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						<p>Quisque ut dolor gravida, placerat libero vel, euismod. Ut enim ad minim veniam, quis nostrud exercitation. Quam temere in vitiis, legem sancimus haerentia. Pellentesque habitant morbi tristique senectus et netus. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore.</p>
						<div class="spacer-30"></div>
						<h3 class="text-secondary mb-4">Availability</h3>
						<p>Mon - Fri : 08.00 am - 20.00 pm</p>
						<p>Saturday : 09.00 am - 20.00 pm</p>
					</div>


				</div>

			</div>
		</div>
	</div>


@endsection
