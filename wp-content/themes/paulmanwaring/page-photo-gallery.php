<?php get_header(); ?>

		<section id="page" class="span8">
			
		<?php $featured_query = new WP_Query('post_type=photo_gallery&showposts=1');
			while ($featured_query->have_posts()) : $featured_query->the_post();
			$do_not_duplicate = $post->ID 
			 ?>
			<h2>
				<?php if( get_field('blog_post_title') ) : ?>	
					<a href="<?php the_field('blog_post_title') ?>"><?php the_title() ?></a>
				<?php else: ?>
					<?php the_title() ?>
				<?php endif; ?>	
			</h2>
			<img src="<?php the_field('photo_image') ?>" alt="<?php the_title() ?>" />			
			
			<?php endwhile; ?>


			<?php 
			 	query_posts('post_type=photo_gallery&showposts=8');
				if(have_posts()) : while (have_posts()) : the_post();
				if($post->ID == $do_not_duplicate ) continue; update_post_caches($posts);
			?>
			
			<img src="<?php the_field('photo_image') ?>" alt="<?php the_title() ?>" />			

			<?php endwhile; else :?>			
				 
			<?php endif; ?>

		</section><!-- #page -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
