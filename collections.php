<!-- coll -->
<?php
/**
 * Template Name: Collections
 *
 * Template for showing BLOG category posts that are using ACF Gallery field.
 *
 * The "Template Name:" bit above allows this to be selectable
 * from a dropdown menu on the edit page screen.
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */
include_once 'includes.php';
get_header(); ?>


<!--
<div id="galleria-wrap-home">
	<div id="galleria"></div>
</div>
-->


<div class="collections">
	<?php query_posts('category_name=collections&posts_per_page=10'); ?>
	<?php  while ( have_posts() ) : the_post(); ?>
	<div class="collections-wrap">
		<h2><? the_title(); ?></h2>
		<?php
		$images = get_field('image');
		$image = $images[0];
		?>
		<?php foreach( $images as $image ): ?>
		<div class="thumb">
			<img src="<?php echo $image['sizes']['thumbnail']; ?>" data-large="<?php echo $image['sizes']['large']; ?>" />
			<div class="data">
				<?php echo $image['title']; ?>
				<?php echo $image['description']; ?>
			</div>
		</div>
		
		<?php endforeach; ?>
			<div class="clear"></div>
			</div>
	<?php endwhile;   ?>
</div>

<? /*
<script>
var data = [

<?php  while ( have_posts() ) : the_post(); ?>

<?php
$images = get_field('collections_background_images');
$image = $images[0];
?>
	<?php $image_text = array(); ?>
	<?php foreach( $images as $image ): ?>
		 <?php $image_text[] = "{ image :'". $image['sizes']['large'] . "', thumb: '".  $image['sizes']['thumbnail'] ."'}"; ?>
	<?php endforeach; ?>
	<?php echo implode( $image_text, ","); ?>
<?php endwhile;  ?>

];
Galleria.loadTheme('<?php bloginfo( 'template_url' ); ?>/js/vendor/galleria-1.2.8/themes/classic/galleria.classic.min.js');
	Galleria.run('#galleria', {
			dataSource: data,
			thumbnails: false,
			responsive: true,
			autoplay: 4000,
			transitionSpeed: 2000,
			imageTimeout: 3000,
			showImagenav: false,
			showCounter: false,
			transition: 'fade',
			imageCrop: true
		});

</script>
*/ ?>
<?php get_footer(); ?>
