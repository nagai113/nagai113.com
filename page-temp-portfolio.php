<?php
/*
Template Name: Portfolio Template
*/
get_header(); ?>

		<!-- begin main -->
		<section class="main">

			<!-- begin my_works -->
			<div class="my_works">

			<h2><?php the_title(); ?></h2>

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

			<?php
				if ( get_query_var('paged') )
				$paged = get_query_var('paged');
				elseif ( get_query_var('page') )
				$paged = get_query_var('page');
				else
				$paged = 1;

				$args = array(
				'post_type' => 'work',
				'paged' => $paged );
				query_posts($args);
			?>

     		<?php if (have_posts()) : $count = 0; ?>
			<?php while (have_posts()) : the_post(); $count++; global $post; ?>

			<!-- begin work_item -->
			<div class="work_item">

				<?php $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
					
				<a href="<?php the_permalink(); ?>">
					<?php if(has_post_thumbnail()): ?>
					<img src="<?php echo $thumbnail[0] ?>" alt="<?php the_title(); ?>" />
					<?php else: ?>
					<img src="<?php bloginfo('template_url'); ?>/images/porto.jpg" alt="<?php the_title(); ?>" />
					<?php endif; ?>
				</a>

				<div class="work_details">
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				</div>

				<div class="post-content">
					<?php echo the_excerpt(); ?> 
				</div>

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