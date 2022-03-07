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

