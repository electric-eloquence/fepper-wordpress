<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Fepper
 */
?>

	</div><!-- .site-content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<?php
				/**
				 * Fires before the footer text for footer customization.
				 */
				do_action( 'fepper_credits' );
			?>
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'fepper' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'fepper' ), 'WordPress' ); ?></a>
		</div><!-- .site-info -->
	</footer><!-- .site-footer -->

</div><!-- .site -->

<?php wp_footer(); ?>

</body>
</html>
