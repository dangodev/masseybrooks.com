<?php get_header();?>
  <section id="single-project" class="content">
<?php if(have_posts()) :
	while(have_posts()) : the_post(); ?>
	<div id="project-top">
	  <div id="main-image">
        <div id="project-1" style="background-image:url('<?php $main = get_field('main_image'); echo $main['sizes']['medium']; ?>');"></div>
      </div>
      <div id="more-images">
        <div id="project-2" style="background-image:url('<?php $image_2 = get_field('image_2'); echo $image_2['sizes']['medium']; ?>');"></div>
        <div id="three-and-four">
	      <div id="project-3" style="background-image:url('<?php $image_3 = get_field('image_3'); echo $image_3['sizes']['medium']; ?>');"></div>
	      <div id="project-4" style="background-image:url('<?php $image_4 = get_field('image_4'); echo $image_4['sizes']['medium']; ?>');"></div>
	    </div>
	  </div>
  </div>
  <div id="project-bottom">
	  <article>
	  	<?php the_content(); ?>
	  </article>
    <ul class="project-details">
      <li><h2><?php the_title(); ?></h2></li>
    <?php $file = get_field('project_file');
    $details = get_field('project_details');
    if(!empty($file)) { ?><li><a class="project-file" href="<?= $file['url']; ?>" target="_blank"><i class="icn icn--file"></i>&nbsp;View Full Project</a></li><?php } 
    foreach($details as $detail) {
      $string = (!empty($detail['link'])) ? '<a href="' . $detail['link'] . '" target="_blank">' : '';
      $string .= $detail['item'];
      $string .= (!empty($detail['link'])) ? '</a>' : '';
    ?>
      <li><?= $string ?></li>
 <?php } ?>
    </ul>
  </div>
    <?php endwhile; ?>
<?php endif; ?>
  </section>
<?php get_footer(); ?>