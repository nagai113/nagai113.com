<?php get_header(); ?>

		<section class="main">

			<h2><?php the_category(', '); ?></h2>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<!-- begin .post -->
			<article <?php post_class(); ?>>

				<!-- begin .post-thumb -->
				<div class="post-thumb">
					<?php if(has_post_thumbnail()): the_post_thumbnail('single-post-image', array('class'=>'blog-thumb')); else: ?><?php endif; ?>

					<div class="meta">
						<span class="post-date"><?php echo get_the_date(M); ?> <?php echo get_the_date(d); ?></span>
						<span class="post-comments">
							<a href="<?php echo get_comments_link() ?>">
								<?php $comments_count = get_comments_number( $post_id ); echo $comments_count; ?>
							</a>
							<i><?php _e('comments','site5framework') ?></i>
						</span>
					</div>

					<span class="post-author"><i><?php _e('by','site5framework') ?></i> <?php the_author(); ?></span>

				</div>
				<!-- end .post-thumb -->

				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

				<?php the_excerpt(); ?>

			</article>
			<!-- end .post -->

			<?php endwhile; ?>

			<!-- begin #pagination -->
					<?php if (function_exists("emm_paginate")) { emm_paginate(); } ?>
			<!-- end #pagination -->

			<?php endif;?>

		</section>

<div class="clear"></div>
<?php get_footer(); ?>