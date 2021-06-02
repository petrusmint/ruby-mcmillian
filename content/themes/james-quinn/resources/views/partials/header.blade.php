<header id="<?php if ( is_front_page()  ) { echo "header"; } else { echo "header-banner"; } ?>">
    <div class="container">
        <div class="for-menu">
            <div class="menu-area">
                <nav class="navbar navbar-expand-md navbar-light">
                    <a class="navbar-brand" href="/">{{ get_bloginfo("name", "display") }}</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    @if (has_nav_menu('primary_navigation'))
                        {!! 
                            wp_nav_menu([
                            'theme_location' => 'primary_navigation', 
                            'menu_class' => 'navbar-nav form-inline my-2 my-lg-0',
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

<section id="<?php if ( is_front_page()  ) { echo "banner"; } else { echo "blog-banner"; } ?>">
    <div class="text-cont-bg">
        <div class="container">
            <div class="wrapper">
                <div class="row">
                    <div class="col-md-12 d-flex">
                        <div class="text-cont" data-aos="fade-left" data-aos-duration="1000">
                            <?php if ( is_front_page()  ) { ?>
                                <div class="banner-cont">
                                    <h3>{{ get_post_meta(9, 'des', true) }}</h3>
                                    <h1>{!! get_post(9)->post_content !!}</h1>
                                    <div class="links">
                                        <a href="{{ get_post_meta(9, 'buy the book now link', true) }}" class="btn-buy" target="_blank">buy the book</a>
                                        <a href="/#reviews" class="btn-buy readers" target="_blank">Reader's Review</a>
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
