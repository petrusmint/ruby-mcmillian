<div @php(post_class())>
    <div class="blogpost-row">
        <div class="border-cont">
            <div class="row">
                <?php if(!has_post_thumbnail($post->ID)){
                    $class ="no-img";
                    } 
                    else {
                        $class="";
                        ?>
                        <div class="col-md-4 col-sm-4">
                        <a href="<?php echo get_permalink(); ?>">
                        <div class="img-cont">
                            <?php 
                                $featured_img_url = get_the_post_thumbnail_url($blog->ID,'full'); 
                                echo '<img src="'.$featured_img_url.'" alt="post image"/>'
                            ?>
                        </div>
                        </a>
                        </div>
                        <?php
                    }
                ?>
                <div class="col-md-8 col-sm-8 <?php echo $class; ?>"">
                    <div class="text-cont">
                        <a href="<?php echo get_permalink(); ?>">
                            <h2>{{ get_the_title() }}</h2>
                        </a>
                        <div class="date-author">
                            <span class="name"><i class="fas fa-user" aria-hidden="true"></i><?php the_author();?></span>
                            <span class="date"><i class="fas fa-calendar-alt" aria-hidden="true"></i><?php echo get_the_date("F j, Y");?> </span>
                        </div>
                        <div class="blog-summary">
                        <?php
                        $content = get_the_content();
                        $content = preg_replace("/\< *[img][^\>]*[.]*\>/i","",$content,1); 
                        if(strlen($content) > 400)
                            $content = substr($content, 0, 400).' . . . '; 
                        echo wpautop(strip_shortcodes($content));
                        ?>
                        </div>
                        <div class="read-more-btn">
                            <a href="<?php echo get_permalink(); ?>" class="read-more">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


