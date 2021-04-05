@extends('layouts.app')

@section('content')
	@while(have_posts()) @php(the_post())

	<section id="main">
		<div class="container">
			<div class="wrapper">
				<div class="row">
					<div class="col-md-7 order-lg-1 order-md-1 order-sm-2 order-2 d-flex" data-aos="fade-right" data-aos-duration="1000">
						<div class="text-cont" id="book">
							<h2 class="section-heading">{{ get_the_title(11) }}</h2>
							{!! wpautop(get_post(11)->post_content) !!}
						</div>
					</div>
					<div class="col-md-5 order-lg-2 order-md-2 order-sm-1 order-1" data-aos="fade-left" data-aos-duration="1000">
						<div class="img-cont text-center">
							{!! get_the_post_thumbnail(11, 'single-post-thumbnail', ['style' => 'height:auto!important']) !!}
							<!-- <a href="{{ get_post_meta(11, 'paypal', true) }}" class="paypal" target="_blank"></a> -->
							
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</section>

	<section id="author">
		<!-- <div class="container">
			<div class="wrapper">
				<div class="row">
					<div class="col-md-5" data-aos="fade-left" data-aos-duration="1000">
						<div class="img-cont text-center">
							{!! get_the_post_thumbnail(13, 'single-post-thumbnail', ['style' => 'height:auto!important']) !!}
						</div>
					</div>

					<div class="col-md-7 d-flex" data-aos="fade-right" data-aos-duration="1000">
						<div class="text-cont" id="book">
							<h2 class="section-heading">{{ get_the_title(13) }}</h2>
							{!! wpautop(get_post(13)->post_content) !!}
						</div>
					</div>
				</div>
			</div>
		</div> -->
		<div class="container">
			<div class="wrapper">
				<div class="row">
					<div class="col-md-12 d-flex text-center" data-aos="fade-right" data-aos-duration="1000">
						<div class="text-cont" id="book">
							<h2 class="section-heading">{{ get_the_title(13) }}</h2>
							{!! wpautop(get_post(13)->post_content) !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="contact">
		<div class="container">
			<div class="row" data-aos="fade" data-aos-duration="2000">
				<div class="col-md-5">
					<div class="text-social-cont">
						<h2 class="section-heading">{{ get_the_title(19) }}</h2>
						{!! wpautop(get_post(19)->post_content) !!}
					</div>
					
				</div>

				<div class="col-md-7 text-center">
					<div class="form-cont">
						{!! do_shortcode('[contact-form-7 id="4" title="Contact form"]') !!}
					</div>
				</div>
			</div>
		</div>
	</section>
	@endwhile
@endsection
