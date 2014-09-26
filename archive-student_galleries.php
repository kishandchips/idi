<?php
/**
 * Student Gallery Archives Template
 *
 *
 * @package idi
 * @since idi 1.0
 */

get_header(); ?>



	<div id="content">

		<?php 
			$args = array(
				'page_id' => 214			
			);
		
		$query = new WP_Query( $args );
		 ?>

	 	<?php if ( $query->have_posts() ) : ?>
	 		<?php while ( $query->have_posts() ) : $query->the_post(); ?>

			<?php if(get_field('slideshow')): ?>
			<div id="header-image" class="container clearfix">
				<?php
					$values = get_field('slideshow');
					$number_of_slides = count($values);
					?>
					<?php if($number_of_slides > 1): ?>
						<div id="homepage-scroller" class="scroller" data-auto-scroll="true">
							<div class="outer">
								<div class="inner">
									<div class="scroller-mask">						
										<?php $i = 0; ?>
										<?php while (the_repeater_field('slideshow')) : ?>					
										<div class="scroll-item <?php if($i == 0) echo 'current'; ?>" data-id="<?php echo $i;?>">
											<img class="scale" src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('title'); ?>">
											<span class="title" style="background-color: <?php the_sub_field('title_background_colour'); ?>;">
												<?php the_sub_field('title'); ?>
											</span> 
										</div>
										<?php $i++; ?>
										<?php endwhile; ?>
									</div>
									<div class="scroller-navigation">
										<a class="prev-btn icons-arrow-left"></a>
										<a class="next-btn icons-arrow-right"></a>
									</div>
									<div class="scroller-pagination">
										<ul>
											<?php $i = 0; ?>
											<?php while (the_repeater_field('slideshow')) : ?>								
												<li><a class="btn" data-id="<?php echo $i; ?>"><?php echo $i; ?></a></li>	
											<?php $i++; ?>
											<?php endwhile; ?>												
										</ul>
				
									</div>								
								</div>
							</div>
						</div><!-- #homepage-scroller -->			
					<?php else: ?>
						<?php while (the_repeater_field('slideshow', $curr_page_id)) : ?>		
							<div class="scroll-item">
								<img class="scale" src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('title'); ?>">
								<span class="title <?php the_sub_field('title_position'); ?>" style="background-color: <?php the_sub_field('title_background_colour'); ?>;">
									<?php the_sub_field('title'); ?>
								</span>
							</div>
						<?php endwhile; ?>								
					<?php endif; ?>
				</div>	
			<?php endif; ?>	
			<!-- end slideshow -->
		<?php endwhile; ?>
		<?php endif; ?>
		<?php wp_reset_query(); ?>


		<div id="galleries">		
			<?php while ( have_posts() ) : the_post(); ?>	
				<div class="span one-third">
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
					<a class="gallery" rel="gal" href="<?php echo $image[0]; ?>">
						<?php the_post_thumbnail('student-gal'); ?>
					</a>
				</div>
			<?php endwhile; ?>				
		</div>
		<footer id="footer"  role="contentinfo">
			<?php the_time('Y'); ?> <?php _e('Interactive Design Institute Ltd.'); ?> 
		</footer><!-- #colophon -->		
	</div>
	<?php get_template_part('sidebar'); ?>
	

<?php get_footer(); ?>