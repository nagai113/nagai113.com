<?php get_header(); ?>

		<section class="main">

			<!-- begin my_works -->
			<div class="my_works">

			<h2><?php single_cat_title(); ?></h2>

			<!-- begin my_works_filter -->
			<ul class="my_works_filter clearfix">

				<?php
					$single_cat = single_cat_title("",false);\
				?>
				<li <?php if($single_cat=="") echo 'class="active"';?>><a href="<?php  echo get_permalink( of_get_option('portfoliodesc') ) ?>" data-value="all" data-type="all" class="all"><?php _e('all', 'site5framework'); ?></a></li>
				<?php
				$categories=  get_categories('taxonomy=workcat&title_li='); foreach ($categories as $category){ ?>

				<li <?php if($single_cat==$category->name) echo 'class="active"';?>><a href="<?php echo get_term_link($category->slug, 'workcat') ?>" class="<?php echo $category->category_nicename;?>" data-type="<?php echo $category->category_nicename;?>"><?php echo $category->name;?></a></li>
				<?php }?>

			</ul>
			<!-- end my_works_filter -->


			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<!-- begin work_item -->
			<div class="work_item">

				<?php $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
					if(has_post_thumbnail()): echo '<img src="'.$thumbnail[0].'"/>'; else: ?><img src="<?php bloginfo('template_url'); ?>/images/porto.jpg" alt="portfolio" />

				<?php endif; ?>

				<div class="work_details">
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				</div>

				<p><?php echo the_excerpt(); ?></p>

			</div>
			<!-- end work_item -->

			<?php endwhile; ?>

			<!-- begin #pagination -->
			<?php if (function_exists("emm_paginate")) {
					emm_paginate();
				 } else { ?>
			<div class="navigation">
		        <div class="alignleft"><?php next_posts_link('Older') ?></div>
		        <div class="alignright"><?php previous_posts_link('Newer') ?></div>
		    </div>
		    <?php } ?>
	    	<!-- end #pagination -->

			</div>
			<!-- end my_works -->

		</section>
		<!-- end main -->

		<?php endif; ?>

<div class="clear"></div>
<?php get_footer(); ?>