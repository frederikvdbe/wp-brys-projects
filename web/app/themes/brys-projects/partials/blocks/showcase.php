<?php
/**
 * Page header: large heading, then an image that bleeds to the left edge with the
 * intro text next to its top. The image hangs 10rem into the panel below it.
 * An optional small image sits under the text, level with the bottom of the big one.
 *
 * @var array        $args
 * @var string       $title     Heading, use <br> to force a line break. Each next line starts one column further in.
 * @var string|array $text      One paragraph, or a list of paragraphs
 * @var array        $link      Optional, array( 'label' => string, 'url' => string )
 * @var string       $image     Image file name inside assets/dist/images
 * @var string       $image_alt
 * @var array        $image_small Optional, array( 'file' => string, 'alt' => string )
 * @var string       $classes
 */
extract( $args );
$classes   = $classes ?? '';
$image_alt = $image_alt ?? '';
$link      = $link ?? null;
$image_small = $image_small ?? null;
?>

<section class="b-showcase relative z-10 <?= $classes; ?>" data-reveal-sequence>
	<div class="o-container o-grid pt-[7.5rem]">

		<h1 class="b-showcase__title sm:col-span-10 sm:col-start-2 text-[7.125rem] leading-[7.875rem]">
			<?php foreach ( explode( '<br>', $title ) as $index => $line ) : ?>
				<span class="b-showcase__line" data-reveal="lines" data-reveal-delay="<?= $index * 0.08; ?>"><?= $line; ?></span>
			<?php endforeach; ?>
		</h1>

	</div>

	<div class="o-container o-grid mt-[5rem]">

		<div class="b-showcase__image sm:col-span-8 h-[57.125rem] mb-[-10rem]" data-reveal="image" data-reveal-delay="0.3">
			<img class="w-full h-full object-cover"
				 src="<?= get_template_directory_uri(); ?>/assets/dist/images/<?= $image; ?>"
				 width="1212" height="914" alt="<?= esc_attr( $image_alt ); ?>">
		</div>

		<div class="b-showcase__text sm:col-span-4 sm:col-start-9">
			<div class="b-showcase__content">
				<?php foreach ( (array) $text as $index => $paragraph ) : ?>
					<p class="<?= $index > 0 ? 'mt-[1.5rem]' : ''; ?>" data-reveal="fade"><?= $paragraph; ?></p>
				<?php endforeach; ?>

				<?php if ( $link ) : ?>
					<div class="flex mt-[2.75rem]" data-reveal="fade">
						<a href="<?= esc_url( $link['url'] ); ?>" class="c-link"><?= $link['label']; ?></a>
					</div>
				<?php endif; ?>
			</div>

			<?php if ( $image_small ) : ?>
				<div class="b-showcase__small" data-reveal="image">
					<img class="w-full h-[30.3125rem] object-cover"
						 src="<?= get_template_directory_uri(); ?>/assets/dist/images/<?= $image_small['file']; ?>"
						 width="362" height="485" alt="<?= esc_attr( $image_small['alt'] ?? '' ); ?>">
				</div>
			<?php endif; ?>
		</div>

	</div>
</section>
