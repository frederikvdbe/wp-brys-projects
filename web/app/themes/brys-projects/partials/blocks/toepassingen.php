<?php
/**
 * Text on the left with a large image that runs off the right edge of the screen.
 * The heading sits on top of the image, that overlap is part of the design.
 * Sizes come from the 1920px design and are written in rem, see the theme README.
 *
 * @var array $args
 * @var string $title
 * @var string $text
 * @var array  $link   array( 'label' => string, 'url' => string )
 * @var string $image  Image file name inside assets/dist/images
 * @var string $image_alt
 * @var string $classes
 */
extract( $args );
$classes   = $classes ?? '';
$image_alt = $image_alt ?? '';
?>

<section class="b-toepassingen relative <?= $classes; ?>" data-reveal-sequence>

	<?php // 35.5rem is where grid column 5 starts, the image runs from there to the right edge ?>
	<div class="o-bleed-right absolute top-0 right-0 h-[57.125rem] pl-[35.5rem]">
		<div class="h-full" data-reveal="image">
			<img class="w-full h-full object-cover"
				 src="<?= get_template_directory_uri(); ?>/assets/dist/images/<?= $image; ?>"
				 width="1212" height="914" alt="<?= esc_attr( $image_alt ); ?>">
		</div>
	</div>

	<div class="o-container relative">
		<div class="pt-[29.625rem] pb-[24.75rem]">
			<h2 class="text-[5.25rem]" data-reveal="lines"><?= $title; ?></h2>

			<p class="mt-[1.0625rem] max-w-[31.5rem]" data-reveal="fade"><?= $text; ?></p>

			<div class="flex mt-[2.75rem]" data-reveal="fade">
				<a href="<?= esc_url( $link['url'] ); ?>" class="c-link"><?= $link['label']; ?></a>
			</div>
		</div>
	</div>

</section>
