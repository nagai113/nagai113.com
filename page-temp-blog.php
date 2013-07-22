<?php
/*
Template Name: Blog
*/
get_header(); ?>

		<!-- begin main -->
		<section class="main">

			<h1>BLOG</h1>

			<?php
				// WP 3.0 PAGED BUG FIX
				if ( get_query_var('paged') )
				$paged = get_query_var('paged');
				elseif ( get_query_var('page') )
				$paged = get_query_var('page');
				else
				$paged = 1;

				$args = array(
				'post_type' => 'post',
				'paged' => $paged );
				query_posts($args);
			?>

			<?php if (have_posts()) : $count = 0; ?>

			<?php while (have_posts()) : the_post(); $count++; global $post; ?>

			<!-- begin .post -->
			<article <?php post_class(); ?>>

				<?php if(of_get_option('posts_layout') == 'pexcerpt') { ?>

					<!-- begin .post-thumb -->
					<div class="post-thumb">
						<?php if(has_post_thumbnail()): the_post_thumbnail('single-post-image', array('class'=>'blog-thumb')); else: ?><?php endif; ?>

						<div class="meta">
							<span class="post-date"><?php echo get_the_date(M); ?> <?php echo get_the_date(d); ?></span>
							<span class="post-comments">
								<a href="<?php echo get_comments_link() ?>">
									<?php $comments_count = get_comments_number( $post_id ); echo $comments_count; ?>
								</a>
								<em><?php _e('comments','site5framework') ?></em>
							</span>
						</div>

						<span class="post-author"><em><?php _e('by','site5framework') ?></em> <?php the_author(); ?></span>

					</div>
					<!-- end .post-thumb -->

					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					 
					<div class="post-content">
						<?php
						global $more;
	        			$more = 0;
	        			the_content(__('Read More','site5framework')); ?>
        			</div>

				<?php } else { ?>

					<!-- begin .post-thumb -->
					<div class="post-thumb">
						<?php if(has_post_thumbnail()): the_post_thumbnail('single-post-image', array('class'=>'blog-thumb')); else: ?><?php endif; ?>

						<div class="meta">
							<span class="post-date"><?php echo get_the_date(M); ?> <?php echo get_the_date(d); ?></span>
							<span class="post-comments">
								<a href="<?php echo get_comments_link() ?>">
									<?php $comments_count = get_comments_number( $post_id ); echo $comments_count; ?>
								</a>
								<em><?php _e('comments','site5framework') ?></em>
							</span>
						</div>

						<span class="post-author"><em><?php _e('by','site5framework') ?></em> <?php the_author(); ?></span>

					</div>
					<!-- end .post-thumb -->

					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

					<?php the_content(__('Read More','site5framework'));  ?>

				<?php } ?>

			</article>
			<!-- end .post -->

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

		</section>
		<!-- end section -->

		<?php endif; ?>

<?php //get_sidebar(); ?>

<div class="clear"></div>

<?php get_footer(); ?>