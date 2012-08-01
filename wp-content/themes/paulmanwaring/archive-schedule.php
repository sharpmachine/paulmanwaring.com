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
		
		<?php // query_posts('post_type=schedule'); ?>
		
<?php
$today = date("Y_m_d");

$args = array(
   'post_type' => 'schedule',
   'posts_per_page' => 50,
   'meta_key' => 'start_date',
   'meta_compare' => '>=',
   'meta_value' => $today,
   'orderby' => 'meta_value',
   'order' => 'ASC'	
);
$query = new WP_Query( $args );
?>		
		
<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?> 
<?php
 
$date = DateTime::createFromFormat('Y_m_d', get_field('start_date'));
echo $date->format('j');
echo "<br />";
echo $date->format('M');
echo "<br />";
echo $date->format('Y');

 
?>
	

	<img src="<?php the_field('event_picture') ?>" alt="<?php the_title() ?>" width="230" height="105" />
	<h2><?php the_title() ?></h2>
	<h3><?php the_field('organization_name') ?></h3>
	<address><?php the_field('street_address') ?><br />
	<?php if( get_field('street_address_2') ) : ?>
		<?php the_field('street_address_2') ?><br />
	<?php endif; ?>	
	<?php the_field('city') ?>, <?php the_field('state') ?>, <?php the_field('zip') ?><br />
	<?php if( get_field('country') ) : ?>	
		<?php the_field('country') ?>
	<?php endif; ?>		
	</address>
	<?php if( get_field('event_url') ) : ?>	
		<p><a href="<?php the_field('event_url') ?>">Event Website</a></p>
	<?php endif; ?>	
		
<?php endwhile; ?>
	<!-- post navigation -->
<?php else: ?>
	<!-- no posts found -->
<?php endif; ?>

		</section><!-- #page -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
