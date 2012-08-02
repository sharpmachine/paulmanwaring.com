<?php get_header(); ?>

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

<section id="page" class="span12">

<h1 class="page-title">Schedule</h1>
		
<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?> 

<div class="row">

	<div class="span1">
		<?php
			$date = DateTime::createFromFormat('Y_m_d', get_field('start_date'));
			echo $date->format('j');
			echo "<br />";
			echo $date->format('M');
			echo "<br />";
			echo $date->format('Y');
		?>
	</div>

		
	<div class="span3"><img src="<?php the_field('event_picture') ?>" alt="<?php the_title() ?>" width="230" height="105" /></div>
	<div class="span8">

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

	</div>

</div>

<?php endwhile; ?>
	<!-- post navigation -->
<?php else: ?>
	
	<p>There are currently no events listed in Paul's schedule.</p>
	
<?php endif; ?>

		</section><!-- #page -->
		
<?php get_footer(); ?>
