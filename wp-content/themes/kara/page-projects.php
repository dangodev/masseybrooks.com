<?php /*
	   *  Template Name: Projects
       */
?>
<?php get_header();?>

  <section class="content">
    <section class="posts posts-projects">
		<table id="projects-table" cellpadding="0" cellspacing="0">
			<tr>
	

<?php 	$projects = new WP_Query('post_type=project&posts_per_page=-1');
		$n = 0;
		$color_wheel = array(
			'lightgrey',
			'orange',
			'grey',
			'masseyblue',
			'babayblue',
			'paych'
		);
		$color_count = count($color_wheel);
		if($projects->have_posts()) : while($projects->have_posts()) : $projects->the_post();
		
		$remainder = $n % $color_count; ?>

      <td class="<?php echo $color_wheel[$remainder]; ?>">
      	<div class="image" style="background-image:url(<?php echo get_thumb_src($post->ID, 'medium'); ?>);">
          <a href="<?php the_permalink(); ?>" class="image-link"><span class="number"><?php echo $n+1; ?></span></a>
       </div>
     </td>

<?php if($n % 3 == 2) echo '</tr><tr>'; ?>

<?php $n++; endwhile; else : ?>


      <article>
        <p>No projects found.</p>
      <article>


<?php endif; ?>
			</tr>
		</table>

	</section>
  </section>
<?php get_footer(); ?>