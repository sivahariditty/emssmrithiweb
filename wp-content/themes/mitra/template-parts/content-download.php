<?php
/**
 * Template part for displaying downloads.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mitra
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'large', array( 'class' => 'aligncenter', 'alt' => the_title_attribute( array( 'echo' => false ) ) ) ); ?>
		<?php endif; ?>
		<?php the_content(); ?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
