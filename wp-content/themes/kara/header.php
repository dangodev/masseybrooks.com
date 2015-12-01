<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width;initial-scale=1">
		<title><?php	if(is_front_page()) : ?><?php
				elseif(is_home()) : ?>Blog | <?php
				elseif(is_archive()) : wp_title(' Archive', true, 'right'); ?> | <?php
				else : wp_title(''); ?> | <?php endif;?><?php bloginfo('name'); ?> — <?php bloginfo('description'); ?></title>
		<?php wp_head(); ?>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
		<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
		<link type="text/css" href="<?php bloginfo('template_directory'); ?>/js/idangerous.swiper.css" rel="stylesheet">
		<link type="image/ico" href="<?php bloginfo('url'); ?>/favicon.ico">
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/idangerous.swiper.min.js"></script>
	</head>

	<body <?php body_class(); ?>>
		<div id="main-wrapper">
  			<header class="main-header">
    			<h1><a href="<?php bloginfo('url'); ?>"><img class="header-logo" src="<?php bloginfo('template_directory'); ?>/img/MBDesignLogo.svg" /></a></h1>
    			<nav class="menu"><?php wp_nav_menu(array('theme_location' => 'primary', 'container_class' => 'menu-header')); ?></nav>
  			</header>
