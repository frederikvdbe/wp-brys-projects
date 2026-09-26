<?php
/**
 * Two images next to a short text block.
 * Sizes come from the 1920px design and are written in rem, see the theme README.
 *
 * @var array $args
 * @var array  $image_large  array( 'file' => string, 'alt' => string )
 * @var array  $image_small  array( 'file' => string, 'alt' => string )
 * @var string $text
 * @var array  $link         array( 'label' => string, 'url' => string )
 * @var string $classes
 */
extract( $args );
$classes = $classes ?? '';
?>

<section class="b-detail relative z-10 <?= $classes; ?>">
	<div class="o-container">
		<div class="o-grid">

			<div class="sm:col-span-7" data-reveal="image">
				<img class="w-full h-[77.8125rem] object-cover"
					 src="<?= get_template_directory_uri(); ?>/assets/dist/images/<?= $image_large['file']; ?>"
					 width="930" height="1245" alt="<?= esc_attr( $image_large['alt'] ?? '' ); ?>">
			</div>

			<div class="sm:col-span-3">
				<div data-reveal="image">
					<img class="w-full h-[30.3125rem] object-cover"
						 src="<?= get_template_directory_uri(); ?>/assets/dist/images/<?= $image_small['file']; ?>"
						 width="362" height="485" alt="<?= esc_attr( $image_small['alt'] ?? '' ); ?>">
				</div>

				<?php // the text starts low, level with the bottom half of the large image ?>
				<p class="mt-[32.6875rem]" data-reveal="fade"><?= $text; ?></p>

				<div class="flex mt-[2.75rem]" data-reveal="fade">
					<a href="<?= esc_url( $link['url'] ); ?>" class="c-link"><?= $link['label']; ?></a>
				</div>
			</div>

		</div>
	</div>
</section>
