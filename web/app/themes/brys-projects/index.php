<?php get_header(); ?>

	<section>
		<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'partials/content/content', 'page' ); ?>

		<?php endwhile; else : ?>

			<?php get_template_part( 'partials/content/content', '404' ); ?>

		<?php endif; ?>

	</section>

<?php get_footer(); ?>
