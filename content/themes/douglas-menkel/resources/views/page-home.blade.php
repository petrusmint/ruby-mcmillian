@extends('layouts.app')

@section('content')
	@while(have_posts()) @php(the_post())

	<section id="main">
		<div class="container">
			<div class="wrapper">
				<div class="row">
					<div class="col-md-5" data-aos="fade-left" data-aos-duration="1000">
						<div class="img-cont text-center">
							{!! get_the_post_thumbnail(11, 'single-post-thumbnail', ['style' => 'height:auto!important']) !!}
						</div>
					</div>
					<div class="col-md-7 d-flex" data-aos="fade-right" data-aos-duration="1000">
						<div class="text-cont" id="book">
							<h2 class="section-heading">{{ get_the_title(11) }}</h2>
							{!! wpautop(get_post(11)->post_content) !!}
							<div class="links">
								<a href="{{ get_post_meta(11, 'buy the book now link', true) }}" class="buy-now" target="_blank">Buy Now</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="reviews">
		<div class="container">
			<div class="wrapper">
				<div class="row">
					<div class="col-md-12">
						<div class="text-cont">
							<h2>Book Reviews</h2>

							<div class="splide">
								<div class="splide__track">
									<ul class="splide__list">
										@php($count=1)
										@foreach ($book_reviews as $review)
											@php($count++)
											<li class="splide__slide">
												<div class="review-list">
													{!! wpautop($review['content']) !!}
													<b>{{ $review['title'] }}</b>
												</div>
											</li>
										@endforeach
									</ul>
								</div>
							</div>

							

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="author">
		<div class="container">
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
		</div>
	</section>

	<section id="excerpts">
		<div class="container">
			<div class="wrapper">
				<div class="row" data-aos="fade" data-aos-duration="2000">
					<div class="col-md-7 d-flex order-lg-1 order-md-1 order-sm-2 order-2">
						<div class="text-cont">
							<h2 class="section-heading">Excerpt</h2>
							{!! wpautop(get_post(15)->post_content) !!}

							<div class="links">
								<a href="{{ $order_fields['paperback-link'] }}" class="buy-now" target="_blank">PAPERBACK | {{ $order_fields['paperback-price'] }}</a>
								<a href="{{ $order_fields['kindle-link'] }}" class="buy-now" target="_blank">KINDLE | {{ $order_fields['kindle-price'] }}</a>
							</div>
						</div>
					</div>
					<div class="col-md-5 order-lg-2 order-md-2 order-sm-1 order-1">
						<div class="img-cont">
							{!! get_the_post_thumbnail(15, 'single-post-thumbnail', ['style' => 'height:auto!important']) !!}
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
