<?php
	/*
	 * Template Name: About
	 */
?>

<?php get_header();?>
 		<section class="content" id="about-page">
<?php while(have_posts()) : the_post(); ?>
	
			<div id="profile-pic">
				<img src="<?php bloginfo('template_directory'); ?>/img/masseyhisquare.jpg" >
				<article id="contact-info">
    				<div> 
    					<a href="mailto:masseybrooks@gmail.com" class="icn icn--email">masseybrooks@gmail.com</a>
    				</div>

    				<div> 
    					<a href="tel:3217951176" class="icn icn--phone">321.795.1176</a>
    				</div>

    				<div>
    					<a href="<?php $file = get_field('cv_file'); echo $file['url']; ?>" target="_blank"><i class="icn icn--file"></i>&nbsp;Open CV</a>
    				</div>
    			
    		</article>
			</div>
			
			<article class="page">
				<?php the_content('Read More'); ?>
    		</article>
    		
    		
    		
    		
<?php endwhile; ?>
 		</section>
<?php get_footer(); ?>