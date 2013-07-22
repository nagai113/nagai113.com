<!-- begin #slider -->

<div id="slider_container" class="container">

	<div class="flexslider loading ">

		<ul class="slides">

			<?php
				$captions = array();
				$tmp = $wp_query;
				$wp_query = new WP_Query('post_type=slider&orderby=menu_order&order=ASC');
				if($wp_query->have_posts()) : while($wp_query->have_posts()) : $wp_query->the_post();

				$slideritemlink	= get_post_meta($post->ID, SN.'slider_item_link',true);
				$slidercaption	= get_post_meta($post->ID, SN.'slider_item_caption',true);
                $slideritem = get_post_meta($post->ID, SN.'slider_item_img',true);
			?>

			<li>
				<a href="<?php echo $slideritemlink ?>"><img src="<?php echo $slideritem['url'] ?>" alt="<?php echo $slidercaption ?>" /></a>


				<?php if ($slidercaption!='') : ?>
				<div class="flex-caption">
					<h3><?php echo $slidercaption ?></h3>

					<div class="postdivider"></div>

					<span class="slider_readmore"><a href="<?php echo $slideritemlink ?>">READ MORE</a></span>
				</div>
				<?php endif ?>

			</li> 


		    <?php
		    endwhile; wp_reset_query();
		    endif;
		    $wp_query = $tmp;
	    	?>
		</ul>
	</div>
</div>

<!-- end #slider -->


<!-- flex slider & slider settings -->
<script type="text/javascript">
jQuery.noConflict();
	jQuery(document).ready(function(){
		if ( jQuery( '.flexslider' ).length && jQuery() ) {
		jQuery('.flexslider').flexslider({
			animation:'<?php if(of_get_option('slidereffect')==''): echo 'fade';
				  else: echo of_get_option('slidereffect');
				  endif;?>',
			direction:'vertical',
			controlNav:true,
			directionNav:true,
			animationLoop: true,
			controlsContainer:"",
			pauseOnHover: true,
			nextText:"&rsaquo;",
			prevText:"&lsaquo;",
			keyboardNav: true,
			smoothHeight: true,
			slideshowSpeed: <?php if(of_get_option('sliderpausetime')==''): echo '3000';
				  else: echo of_get_option('sliderpausetime');
				  endif;?>,
			animationSpeed: <?php if(of_get_option('slideranimationspeed')==''): echo '500';
				  else: echo of_get_option('slideranimationspeed');
				  endif;?>,
			start: function(slider) {
				slider.removeClass('loading');
			}

		});
		}
	});
</script>

<!-- end flex slider & slider settings -->