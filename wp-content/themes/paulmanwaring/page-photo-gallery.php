<?php get_header(); ?>

		<section id="page" class="span8">
		
		<div class="row">	
			
			<?php
				query_posts('post_type=photo_gallery&showposts=8');
			?>			

			<ul id="slider">
			<?php 
				while (have_posts()) : the_post(); 
			?>
				<li><?php echo wp_get_attachment_image( get_field('photo_image'), 'large' ); ?></li>
			<?php 
				endwhile; 
			?>
			</ul>
		</div>

		<div class="row">
			
			
			

			<?php if(have_posts()) : ?>
			
			<ul class="thumbnails">
								
			<?php $slideto = 0; ?>					
			<?php while (have_posts()) : the_post(); ?>

			<?php $slideto = $slideto + 1; ?>					
			
			  <li class="span2">
			    <a href="#" class="thumbnail slide-jump" data-slideto="<?php echo $slideto; ?>">
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
