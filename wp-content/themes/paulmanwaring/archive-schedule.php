<?php get_header(); ?>

		<section id="page" class="span8">

<?php
	/* Queue the first post, that way we know
	 * what date we're dealing with (if that is the case).
	 *
	 * We reset this later so we can run the loop
	 * properly with a call to rewind_posts().
	 */
	if ( have_posts() )
		the_post();
?>

		<h1 class="page-title">
<?php if ( is_day() ) : ?>
			<?php printf( __( 'Daily Archives: <span>%s</span>', 'smm' ), get_the_date() ); ?>
<?php elseif ( is_month() ) : ?>
			<?php printf( __( 'Monthly Archives: <span>%s</span>', 'smm' ), get_the_date( 'F Y' ) ); ?>
<?php elseif ( is_year() ) : ?>
			<?php printf( __( 'Yearly Archives: <span>%s</span>', 'smm' ), get_the_date( 'Y' ) ); ?>
<?php else : ?>
			<?php _e( 'Schedule', 'smm' ); ?>
<?php endif; ?>
		</h1>
		
		<?php query_posts('post_type=schedule'); ?>
		
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<h2><?php the_title() ?></h2>
	<p><?php the_field('organization_name') ?></p>
	
<?php endwhile; ?>
	<!-- post navigation -->
<?php else: ?>
	<!-- no posts found -->
<?php endif; ?>

		</section><!-- #page -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
