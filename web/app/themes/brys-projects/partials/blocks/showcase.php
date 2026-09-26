<?php
/**
 * Page header: large heading, then an image that bleeds to the left edge with the
 * intro text next to it. The image hangs 10rem into the panel below it.
 *
 * @var array        $args
 * @var string       $title     Heading, use <br> to force a line break
 * @var string|array $text      One paragraph, or a list of paragraphs
 * @var array        $link      Optional, array( 'label' => string, 'url' => string )
 * @var string       $image     Image file name inside assets/dist/images
 * @var string       $image_alt
 * @var string       $classes
 */
extract( $args );
$classes   = $classes ?? '';
$image_alt = $image_alt ?? '';
$link      = $link ?? null;
?>

<section class="b-showcase relative z-10 <?= $classes; ?>">
	<div class="o-container o-grid pt-[11.5rem]">

		<h1 class="sm:col-span-10 text-[7.125rem] leading-[7.875rem]"><?= $title; ?></h1>

	</div>

	<div class="o-container o-grid mt-[7.5rem]">

		<div class="b-showcase__image sm:col-span-8 h-[57.125rem] mb-[-10rem]">
			<img class="w-full h-full object-cover"
				 src="<?= get_template_directory_uri(); ?>/assets/dist/images/<?= $image; ?>"
				 width="1212" height="914" alt="<?= esc_attr( $image_alt ); ?>">
		</div>

		<div class="b-showcase__text sm:col-span-3 sm:col-start-10 self-end pb-[3rem]">
			<?php foreach ( (array) $text as $index => $paragraph ) : ?>
				<p class="<?= $index > 0 ? 'mt-[1.5rem]' : ''; ?>"><?= $paragraph; ?></p>
			<?php endforeach; ?>

			<?php if ( $link ) : ?>
				<div class="flex mt-[2.75rem]">
					<a href="<?= esc_url( $link['url'] ); ?>" class="c-link"><?= $link['label']; ?></a>
				</div>
			<?php endif; ?>
		</div>

	</div>
</section>
