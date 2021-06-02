<div class="blogpost-row">
		
		<?php if(!has_post_thumbnail($post->ID)){
			$class ="no-img";
			} 
			else {
				$class="";
				?>
				<div class="img-cont">
					<a href="<?php echo get_the_permalink($post->ID); ?>">
					<?php the_post_thumbnail('full', array('alt' => get_the_title()) ); ?>
					</a>
				</div>
				<?php
			}
		?>
	<div class="<?php echo $class; ?>">
		<div class="text-cont">
			<h2><a href="<?php the_permalink(); ?>">{{ get_the_title() }}</a></h2>
			<div class="date-author">
				<span class="name"><i class="fas fa-user" aria-hidden="true"></i><?php the_author();?></span>
				<span class="date"><i class="fas fa-calendar-alt" aria-hidden="true"></i><?php echo get_the_date("F j, Y");?> </span>
			</div>
			<div class="blog-summary">
				<?php
				$content = get_the_content();
				$content = preg_replace("/\< *[img][^\>]*[.]*\>/i","",$content,1); 
				if(strlen($content) > 400)
					//$content = '<p>'.substr($content, 0, 400).'...</p>'; 
						$content = substr($content, 0, 400).' . . . '; 
				else
				$content =  $content;
			
					echo wpautop(strip_shortcodes($content));
				?>
			</div>
			<div class="read-more-btn">
				<a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
			</div>
		
		</div>
	</div>
</div>







