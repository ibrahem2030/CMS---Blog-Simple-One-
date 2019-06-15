@include('inc.header')
<!-- PAGE HEADER -->
		<div class="page-header">
			<div class="page-header-bg" style="background-image: url({{$post->file}});" data-stellar-background-ratio="0.5"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-offset-1 col-md-10 text-center">
						<h1 class="text-uppercase">{{$post->title}}</h1>
						<p class="lead">{{$post->category->name}}</p>
					</div>
				</div>
			</div>
		</div>
		<!-- /PAGE HEADER -->

			<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-8">
					<div class="section-row">
						<div class="section-title">
							<h3 class="title">Created At : {{$post->created_at}} , </h3>
							<h3 class="title">Since : {{$post->created_at->diffForHumans()}}</h3>
						</div>
						<h1>{{$post->title}}</h1>
						<p>{{$post->content}}</p>
						<hr>
						@foreach($post->tags as $tag)
							<span>Tags : <a href="{{route('show.tag', ['id' => $tag->id])}}" class="badge badge-secondary">{{$tag->tag}}</a></span>
						@endforeach
						<hr>
						<span>Category : <a href="{{route('show.category', ['id' => $post->category->id ])}}" class="badge badge-secondary">{{$post->category->name}}</a></span>
					</div>
					

					@include('inc.disqus')

					<br><hr>


				
					 		

							<!-- post nav -->
							<div class="section-row">
								<div class="post-nav">

									
									<div class="prev-post">
										<a class="post-img" href="{{route('show.post', ['slug' => $prev_post->slug])}}">
											<img src="{{$prev_post->file}}" alt=""></a>
										<h3 class="post-title"><a href="{{route('show.post', ['slug' => $prev_post->slug])}}">{{$prev_post->title}}</a></h3>
										<span>Previous post</span>
									</div>
							

									
									<div class="next-post">
										<a class="post-img" href="{{route('show.post', ['slug' => $next_post->slug])}}">
											<img src="{{$next_post->file}}" alt=""></a>
										<h3 class="post-title"><a href="{{route('show.post', ['slug' => $next_post->slug])}}">{{$next_post->title}}</a></h3>
										<span>Next post</span>
									</div>
					

								</div>
							</div>
							<!-- /post nav  -->
		

					

					

					
				</div>

				<div class="col-md-4">
					<!-- social widget -->
					<div class="aside-widget">
						<div class="section-title">
							<h2 class="title">Social Media</h2>
						</div>
						<div class="social-widget">
							<ul>
								<li>
									<a href="#" class="social-facebook">
										<i class="fa fa-facebook"></i>
										<span>21.2K<br>Followers</span>
									</a>
								</li>
								<li>
									<a href="#" class="social-twitter">
										<i class="fa fa-twitter"></i>
										<span>10.2K<br>Followers</span>
									</a>
								</li>
								<li>
									<a href="#" class="social-google-plus">
										<i class="fa fa-google-plus"></i>
										<span>5K<br>Followers</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
					<!-- /social widget -->

					<!-- newsletter widget -->
					<div class="aside-widget">
						<div class="section-title">
							<h2 class="title">Newsletter</h2>
						</div>
						<div class="newsletter-widget">
							<form>
								<p>Nec feugiat nisl pretium fusce id velit ut tortor pretium.</p>
								<input class="input" name="newsletter" placeholder="Enter Your Email">
								<button class="primary-button">Subscribe</button>
							</form>
						</div>
					</div>
					<!-- /newsletter widget -->
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

@include('inc.footer')