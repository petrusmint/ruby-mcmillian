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
							<form style="padding-top:40px" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
								<input type="hidden" name="cmd" value="_s-xclick">
								<input type="hidden" name="hosted_button_id" value="AEAEK5DCRNN4L">
								<table style="display:none">
								<tr><td><input type="hidden" name="on0" value="Book 6 X 9">Book 6 X 9</td></tr><tr><td><select name="os0">
								<option value="Option 1">Option 1 $11.99 USD</option>
								<option value="Option 2 2015 Edition"> USD</option>
								</select> </td></tr>
								</table>
								<input type="hidden" name="currency_code" value="USD">
								<input type="image" src="@asset('images/paypal.png')" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
								<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
							</form>
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
