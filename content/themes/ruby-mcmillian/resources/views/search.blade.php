@extends('layouts.app')

    @section('content')
    <?php 
        remove_filter( 'the_title', 'wptexturize' );
        remove_filter('the_content', 'wptexturize');
    ?>

        <section class="search-result blog-content">
        <section id="banner">
            <div class="blog-menu">
                <span>Follow Charles:</span>
                <div class="social-cont">
                    {!! wp_nav_menu(['menu' => 'Footer Social Menu', 'menu_class' => 'footer-social']) !!}
                </div>
                <div class="vl"></div>
                <a href="/Blog">Blog</a>
            </div>
            <div class="container">
                <div class="wrapper">
                    <h1 class="text-center h2-head">Blog</h1>
                </div>
            </div>
        </section>
        <header id="header">
            <div class="container">
                <div class="for-menu">
                    <div class="menu-area">
                        <nav class="navbar navbar-expand-md navbar-light">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                            </button>
                            @if (has_nav_menu('primary_navigation'))
                                {!! 
                                    wp_nav_menu([
                                    'theme_location' => 'primary_navigation', 
                                    'menu_class' => 'navbar-nav',
                                    'container_class' =>'collapse navbar-collapse',
                                    'container_id' => 'navbarNavAltMarkup'
                                    ]);
                                !!}
                            @endif
                        </nav>
                    </div>
                </div>
            </div>
        </header>
            <div class="container">
                <div class="bg-holder">
                    <div class="content-holder">
                        <h1 class="text-center h2-head">Search</h1>
                        <div class="row">
                            <div class="col-lg-8 col-md-12" data-aos="fade-up-right" data-aos-delay="500" data-aos-duration="1500">
                                @if (!have_posts())
                                    <div class="alert alert-warning">
                                      {{  __('Sorry, no results were found.', 'sage') }}
                                    </div>
                                @endif

                                @while(have_posts()) @php(the_post())
                                    @include('partials.content-search')
                                @endwhile
                                <div class="clearfix">
                                <?php $args = array(
                                    'prev_text'          => 'Previous Page',
                                    'next_text'          => 'Next Page',
                                    'screen_reader_text' => 'Post navigation'
                                   );
                                   the_posts_navigation($args); ?>

                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12" data-aos="fade-up-left" data-aos-delay="500" data-aos-duration="1500">
                                @include('blogsidebar')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection


