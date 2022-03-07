@extends('layouts.app')

@section('content')

<?php
remove_filter( 'the_title', 'wptexturize' );
remove_filter( 'the_content', 'wptexturize' );
remove_filter( 'the_excerpt', 'wptexturize' );
?>

    <section id="<?php if ( is_front_page()  ) { echo "banner"; } else { echo "blog-banner"; } ?>">
        <div class="text-cont-bg">
            <div class="container">
                <div class="wrapper">
                    <div class="row">
                        <div class="col-md-12 d-flex">
                            <div class="text-cont" data-aos="fade-left" data-aos-duration="1000">
                                <?php if ( is_front_page()  ) { ?>
                                    <div class="banner-cont">
                                        <h1>{!! get_post(9)->post_content !!}</h1>
                                        <h3>{{ get_post_meta(9, 'des', true) }}</h3>
                                        <div class="links">
                                            <a href="{{ get_post_meta(9, 'buy the book now link', true) }}" class="btn-buy" target="_blank">buy the book</a>
                                        </div>
                                    </div>
                                <?php } elseif (is_home()) { ?>
                                    <h1 class="text-center h2-head"><span>Blog</span></h1>
                                <?php } else { ?>
                                    <h1 class="text-center">{{ get_the_title() }}</h1>
                                <?php } ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section><!-- /#banner -->

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
