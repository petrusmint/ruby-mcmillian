<?php
wp_enqueue_script('google-recaptcha', 'https://www.google.com/recaptcha/api.js');
remove_filter( 'the_title', 'wptexturize' );
remove_filter('the_content', 'wptexturize');
?>

  
<section class="blog-content">
  
    <div class="container">
      <div class="bg-holder">
        <div class="content-holder">
        <div class="row">
            <?php //while (have_posts()) : the_post(); ?>
            <div class="col-lg-8 col-md-12">
                  
                  <div class="blogpost-row blog-detail">
                     
                      <div class="text-cont">
                          <div class="date-author">
                             <span class="name"><i class="fas fa-user" aria-hidden="true"></i><?php the_author();?></span>
                            <span class="date"><i class="fas fa-calendar-alt" aria-hidden="true"></i><?php echo get_the_date("F j, Y");?> </span>
                          </div>
                           @php(the_content())

                          
                      </div>
                  </div>
                  <div class="blog-comment">
                      {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
                      
                          
                            @php(comments_template('/partials/comments.blade.php'))
                  </div>
            </div>
            <?php //endwhile; ?>
            <div class="col-lg-4 col-md-12">
                @include('blogsidebar')
               
            </div>
        </div>
        </div>
      </div>
    </div>
</section>



