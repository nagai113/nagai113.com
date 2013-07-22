<?php get_header(); ?>

		<!-- begin main -->
		<section class="main">

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
						<em><?php _e('comments','site5framework') ?></em>
					</span>
				</div>

				<span class="post-author"><em><?php _e('by','site5framework') ?></em> <?php the_author(); ?></span>

			</div>
			<!-- end .post-thumb -->

			<h2><?php the_title(); ?></h2>

			<?php the_content(); ?>

			<?php endwhile; ?>
			<?php comments_template(); ?>

		</article>
		<!-- end .post -->

			<?php endif;?>
		</section>
		<!-- end main -->

<?php get_sidebar(); ?>
<div class="clear"></div>
<?php get_footer(); ?>