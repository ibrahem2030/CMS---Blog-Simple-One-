@include('inc.header')
<!-- SECTION -->
	<div class="section" style="margin-top: 50px;">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-8">
					
					@if($tag)	
					<div class="section-title">
						<h1 class="title" style="font-size: 30px;">{{$tag->tag}}</h1>
					</div>
					
					
					<!-- /post -->

					<div class="clearfix visible-md visible-lg"></div>

					@foreach($tag->posts as $post)
					<!-- post -->
					<div class="post post-row">
						<a class="post-img" href="blog-post.html"><img src="{{$post->file}}" alt=""></a>
						<div class="post-body">
							<div class="post-category">
								<a href="{{route('show.category', ['id' => $post->category->id ])}}">{{$post->category->name}}</a>
							</div>
							<h3 class="post-title"><a href="{{route('show.post', ['slug' => $post->slug])}}">{{$post->title}}</a></h3>
							<ul class="post-meta">
								<li><a href="author.html">John Doe</a></li>
								<li>{{$post->created_at->diffForHumans()}}</li>
							</ul>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
						</div>
					</div>
					<!-- /post -->
					@endforeach
					@else 
						<div class="section-title">
							<h1 class="title" style="font-size: 30px;">No Result</h1>
						</div>
					@endif

					<div class="section-row loadmore text-center">
						<a href="#" class="primary-button">Load More</a>
					</div>
				</div>

				<div class="col-md-4">
					<!-- ad widget-->
					<div class="aside-widget text-center">
						<a href="#" style="display: inline-block;margin: auto;">
							<img class="img-responsive" src="./img/ad-3.jpg" alt="">
						</a>
					</div>
					<!-- /ad widget -->

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

					<!-- category widget -->
					<div class="aside-widget">
						<div class="section-title">
							<h2 class="title">Categories</h2>
						</div>
						<div class="category-widget">
							<ul>
								@foreach($categories as $category)
								<li><a href="{{route('show.category', ['id' => $category->id ])}}">{{$category->name}} : <span>{{count($category->posts)}}</span></a></li>
								@endforeach
							</ul>
						</div>
					</div>
					<!-- /category widget -->

					


					<!-- Ad widget -->
					<div class="aside-widget text-center">
						<a href="#" style="display: inline-block;margin: auto;">
							<img class="img-responsive" src="./img/ad-1.jpg" alt="">
						</a>
					</div>
					<!-- /Ad widget -->
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->
@include('inc.footer')