<?php
	/*
	 * Template Name: Home
	 */
?>

<?php get_header();?>
</div>
		<section class="content">
<?php while(have_posts()) : the_post(); ?>
			<div id="home-slider">
			  <a class="icn icn--tri-l prev-slide" href="#"></a>
			  <a class="icn icn--tri-r next-slide" href="#"></a>
			  <div class="swiper-container swiper-partial">
			    <div class="swiper-wrapper">
			    	<?php $projects = new WP_Query('post_type=project&posts_per_page=-1');
					while($projects->have_posts()) : $projects->the_post(); 
					$featured = get_field('featured', $post->ID);
					if($featured === true) : 
						$image = get_thumb_src($post->ID, array(1000,350)); ?>
			      <div class="swiper-slide">
			      	<a href="<?php the_permalink(); ?>" style="background-image:url('<?php echo $image; ?>');"><?php echo $post->post_title; ?></a>
			      </div>
			      <?php endif; endwhile; wp_reset_query(); ?>
			    </div>
			  </div>
			</div>

<?php endwhile; ?>
  		</section>
  		<script type="text/javascript">
  		$(function() {
			var swiper = $('.swiper-partial').swiper({
				slidesPerSlide:'auto'
			});
			$('.prev-slide').click(function(e) {
		        e.preventDefault()
				swiper.swipePrev()
		    });
			$('.next-slide').click(function(e) {
		        e.preventDefault()
				swiper.swipeNext()
		    });
  		});
  		</script>
<?php get_footer(); ?>