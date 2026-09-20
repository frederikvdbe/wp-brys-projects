<?php
/**
 * Template name: Home
 * @var WP_Post $post
 */
?>

<?php get_header(); ?>

<section>
	<article>


		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<?php the_title(); ?>
			<?php the_content(); ?>

		<?php endwhile; endif; ?>

	</article>
</section>


<?php get_footer(); ?>
