<?php
/**
 * Hero setup.
 *
 * @package freeshop
 */

?>

<?php if ( is_active_sidebar( 'hero' ) or is_active_sidebar( 'statichero' ) ) : ?>

	<div class="wrapper" id="wrapper-hero">
	
		<?php get_sidebar( 'hero' ); ?>
		
		<?php get_sidebar( 'statichero' ); ?>

	</div>

<?php endif; ?>
