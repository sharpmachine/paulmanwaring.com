<?php get_header(); ?>

		<section id="page" class="span8">
		
		<div class="row">	
			
		<?php
			$selected_photo = $_GET["select"];
		?>	
		<h1><?php echo $selected_photo; ?>
		<?php 
			query_posts("post_type=photo_gallery&showposts=1&post_id=".$selected_photo);
			while (have_posts()) : the_post(); 
		?>
			<h2>
				<?php if( get_field('blog_post_title') ) : ?>	
					<a href="<?php the_field('blog_post_title') ?>"><?php the_title() ?></a>
				<?php else: ?>
					<?php the_title() ?>
				<?php endif; ?>	
			</h2>
			
			<?php
				echo wp_get_attachment_image( get_field('photo_image'), 'large' );
			?> 
	
		

					
			
		<?php endwhile; ?>
		</div>

		<div class="row">
			
			<?php query_posts('post_type=photo_gallery&showposts=8'); ?>
			

			<?php if(have_posts()) : ?>
			
			<ul class="thumbnails">
								
			<?php while (have_posts()) : the_post();
				if($post->ID == $do_not_duplicate ) continue; update_post_caches($posts);
			?>

			  <li class="span2">
			    <a href="/photo-gallery?select=<?php echo the_id(); ?>" class="thumbnail">
			      	<?php
						echo wp_get_attachment_image( get_field('photo_image'), 'thumbnail' );
					?>
			    </a>
			  </li>
			
			
			<?php endwhile; ?>			
			
			</ul>
				 
			<?php endif; ?>

		</div>
	</section><!-- #page -->
		
<?php get_footer(); ?>
