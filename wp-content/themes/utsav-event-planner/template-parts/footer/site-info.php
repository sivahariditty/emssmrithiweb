<?php
/**
 * Displays footer site info
 *
 * @package WordPress
 * @subpackage utsav-event-planner
 * @since 1.0
 * @version 1.4
 */

?>
<div class="site-info">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<p><?php echo esc_html(get_theme_mod('utsav_event_planner_footer_copy',__('Event Planner WordPress Theme By','utsav-event-planner'))); ?> <?php utsav_event_planner_credit(); ?></p>
			</div>
			<div class="col-lg-6 col-md-6">
				<div class="social-icons">
					<?php if( get_theme_mod( 'utsav_event_planner_facebook_url') != '') { ?>
				      <a href="<?php echo esc_url( get_theme_mod( 'utsav_event_planner_facebook_url','' ) ); ?>"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
				    <?php } ?>
				    <?php if( get_theme_mod( 'utsav_event_planner_twitter_url') != '') { ?>
				      <a href="<?php echo esc_url( get_theme_mod( 'utsav_event_planner_twitter_url','' ) ); ?>"><i class="fab fa-twitter"></i></a>
				    <?php } ?>
				    <?php if( get_theme_mod( 'utsav_event_planner_insta_url') != '') { ?>
				      <a href="<?php echo esc_url( get_theme_mod( 'utsav_event_planner_insta_url','' ) ); ?>"><i class="fab fa-instagram"></i></a>
				    <?php } ?>
				    <?php if( get_theme_mod( 'utsav_event_planner_linkedin_url') != '') { ?>
				      <a href="<?php echo esc_url( get_theme_mod( 'utsav_event_planner_linkedin_url','' ) ); ?>"><i class="fab fa-linkedin-in"></i></a>
				    <?php } ?>	 
				    <?php if( get_theme_mod( 'utsav_event_planner_pinterest_url') != '') { ?>
				      <a href="<?php echo esc_url( get_theme_mod( 'utsav_event_planner_pinterest_url','' ) ); ?>"><i class="fab fa-pinterest-p"></i></a>
				    <?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>