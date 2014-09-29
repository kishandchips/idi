<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package idi
 * @since idi 1.0
 */

get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>	
	<div id="content">

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
		<div class="post">		
			<?php if(!$post->post_content == ''): ?>
			<div class="page-content">
			<?php the_content(); ?>
			</div>
			<?php endif; ?>

			<?php if ( get_field('content')):?>
				<?php get_template_part('inc/content'); ?>
			<?php endif; ?>
		</div>

		<?php 
			$args = array(
		        'post_type' => 'student_galleries',
		        'showposts' => 8		
			);
		
			$query = new WP_Query( $args );
		 ?>

	 	<?php if ( $query->have_posts() ) : ?>
			<div id="galleries">
			<a class="front-page-link" href="<?php bloginfo('url'); ?>/student-gallery/">See All</a>
			<h2 class="front-page-title">Student Gallery</h2>

		 	<?php while ($query->have_posts()) : $query->the_post(); ?>	
					<div class="span two-and-half">
						<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
						<a class="gallery" rel="gal" href="<?php echo $image[0]; ?>">
							<?php the_post_thumbnail('student-gal', array('class' => 'scale')); ?>
						</a>
					</div>
			<?php endwhile; ?>
			</div>
		<?php endif; ?>
		<?php wp_reset_query(); ?>

			<div id="quotes">
				<div class="span four break-on-mobile">
					<?php $image = get_field('image', 'option'); ?>
					<img class="scale" src="<?php echo $image['url']; ?>" alt="">
				</div>
				<div class="span six break-on-mobile">
					<?php if(get_field('quotes', 'option')): ?>
						<ul class="cycle-slideshow" data-cycle-slides="> li">
						<?php while(has_sub_field('quotes', 'option')): ?>
							<li>
								<blockquote>
									<p><?php the_sub_field('quote_text'); ?></p>
									<p><?php the_sub_field('quote_author'); ?></p>
								</blockquote>
							</li>
						<?php endwhile; ?>
						</ul>
					<?php endif; ?>			
				</div>
			</div>
		<footer id="footer"  role="contentinfo">
			<div class="footer-innnnnnner">
				<a href="<?php bloginfo( 'url' ); ?>" title="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
					<img src="<?php bloginfo('template_url')?>/images/logos/footer.png" alt="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
				</a>		
				<?php the_time('Y'); ?> <?php _e('Interactive Design Institute Ltd.'); ?> 
			</div>
		</footer><!-- #colophon -->		
	</div>
	<?php get_template_part('sidebar'); ?>
	<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>