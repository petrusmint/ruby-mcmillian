<div class="search-cont">
    <?php get_search_form(); ?>
</div>
<div class="blogside-wrap">
    <div class="bg-holder">
        <div class="author-maincont">
            
             <div class="img-cont">
                <div class="img-cont2">
                    <?php 
                        $author_pageID = 13;
                        $authorFields = get_post_meta( $author_pageID, 'author_field', true );
                    ?>
                    <?php
                        if(!empty($authorFields[0]['author-blog-image'])){
                            $author = wp_get_attachment_image_src( $authorFields[0]['author-blog-image'], 'thumbnail', false );
                            echo '<img class="hidden" src="'.$author[0].'" alt="'.get_bloginfo('name').'"/>';
                        }   
                    ?>
                </div>
            </div>

            <div class="sidebar-author-title">
                <h3>About the Author</h3>
            </div>
            
            <div class="author-cont">
                <div class="text-cont">
                    <?php
                        $query = new WP_Query('page_id=13');
                    ?>
                    <?php
                        while($query->have_posts()): $query->the_post();
                        //the_content();
                        $content = get_the_content();
                        $content = preg_replace("/\< *[img][^\>]*[.]*\>/i","",$content,1); 
                        if(strlen($content) > 110)
                            
                             $content = substr($content, 0, 110).' . . . '; 
                        else
                        $content =  $content;
                   
                         echo wpautop(strip_shortcodes($content));
                    ?>
                    <?php endwhile; ?>
                    
                    <?php wp_reset_postdata(); ?>  
                    <div class="read-more-cont">
                        <a href="<?php echo get_home_url(); ?>/#author" class="read-more">[ Read more ]</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="post-cont">
            <?php
                dynamic_sidebar('sidebar-primary');
            ?>
        </div>     
    </div> 
</div>