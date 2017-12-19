<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Inkzine
 */
?>
<?php get_template_part('modules/header/head'); ?>


<body <?php body_class(); ?>>
<div id="parallax-bg" data-stellar-background-ratio="1.3"></div>
<div id="page" class="hfeed site">
    <?php get_template_part('modules/header/ticker'); ?>
    <?php get_template_part('modules/header/top-bar'); ?>
    <?php get_template_part('modules/header/masthead'); ?>

    <?php get_template_part('slider'); ?>



	<div id="content" class="site-content row">
		<div class="container col-md-12"> 
