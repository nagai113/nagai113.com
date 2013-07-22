
		<div class="clear"></div>

		<!-- begin footer -->
		<footer>

		<div class="footer_widgets clearfix">

			<?php if ( !function_exists('dynamic_sidebar') || dynamic_sidebar(FooterLeft) ) { ?><?php } else { ?>
		    <?php }?>

		    <?php if ( !function_exists('dynamic_sidebar') || dynamic_sidebar(FooterRight) ) { ?><?php } else { ?>
		    <?php }?>

		</div>

		</footer>
        <!-- end footer -->

		<!-- begin .copyright -->
		<div class="copyright">

			<?php if(of_get_option('footer_copyright') == '') { ?>
				Created by <a href="http://www.s5themes.com/">Site5 WordPress Themes</a>. Experts in <a href="http://gk.site5.com/t/615">WordPress Hosting</a>.
			<?php } else { ?>
				<?php echo of_get_option('footer_copyright')  ?>
			<?php } ?>

		</div>
		<!-- end .copyright -->


	</div>
	<!-- end container -->

	<?php wp_footer(); ?> 

	</body>
</html>