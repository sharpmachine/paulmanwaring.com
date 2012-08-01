<?php get_header(); ?>

		<section id="page" class="span8">

		<h1 class="page-title">Products</h1>
		
<?php query_posts('post_type=products'); ?>		
		
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?> 

	<p><?php the_field('product_type') ?></p>
	<img src="<?php the_field('product_image') ?>" alt="<?php the_title() ?>" />
	<h2><?php the_title() ?></h2>
	<h3>By <?php the_field('author') ?></h3>
	<p><?php the_field('product_description')?>
	<?php if( get_field('store_url') ) : ?>	
		<p><a href="<?php the_field('store_url') ?>">Buy Now at iBethel Store</a></p>
	<?php endif; ?>	
		
<?php endwhile; ?>
	<!-- post navigation -->
<?php else: ?>
	<!-- no posts found -->
<?php endif; ?>

		</section><!-- #page -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
