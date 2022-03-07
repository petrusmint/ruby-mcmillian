@extends('layouts.app')

@section('content')
	@while(have_posts()) @php(the_post())
    
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

    <section id="gallery">
        <div class="container">
            <div class="wrapper">
                <div class="row">
                    <div class="col-md-12">
                        <div class="gallery-cont">
                            {!! do_shortcode('[foogallery id="450"]') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

	@endwhile
@endsection