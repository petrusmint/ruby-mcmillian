@extends('layouts.app')

@section('content')

<?php
remove_filter( 'the_title', 'wptexturize' );
remove_filter( 'the_content', 'wptexturize' );
remove_filter( 'the_excerpt', 'wptexturize' );
?>

    <section class="blog-content">
        <div class="container">
            <div class="bg-holder">
                <div class="content-holder">
                    <div class="row">
                        <div class="col-lg-8 col-md-12">
                            @if (!have_posts())
                            <div class="alert alert-warning">
                              {{ __('Sorry, no results were found.', 'sage') }}
                            </div>
                            @endif
                            

                            @while (have_posts()) @php(the_post())
                                @include('partials.content-'.get_post_type())
                            @endwhile
                            
                            <div class="blog-pagination clearfix">
                                {!! get_the_posts_navigation() !!}
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                           @include('blogsidebar')
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
@endsection
