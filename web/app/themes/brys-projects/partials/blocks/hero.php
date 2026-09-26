<?php
/**
 * Hero: heading and intro on the left, image bleeding to the container edge on the right.
 * Sizes come from the 1920px design and are written in rem, see the theme README.
 *
 * @var array $args
 * @var string $title     Heading, use <br> to force the line break from the design
 * @var string $text      Intro paragraph
 * @var array  $link      array( 'label' => string, 'url' => string )
 * @var string $image     Image file name inside assets/dist/images
 * @var string $image_alt
 * @var string $classes
 */
extract( $args );
$classes   = $classes ?? '';
$image_alt = $image_alt ?? '';
?>

<section class="b-hero relative z-10 <?= $classes; ?>">
	<div class="o-container relative">

		<img class="b-hero__image absolute top-[4.9375rem] right-0 w-[51.25rem] h-[56.9375rem] object-cover"
			 src="<?= get_template_directory_uri(); ?>/assets/dist/images/<?= $image; ?>"
			 width="820" height="911" alt="<?= esc_attr( $image_alt ); ?>">

		<div class="b-hero__content relative flex flex-col justify-center pt-[4.9375rem] min-h-(--hero-height)">
			<h1 class="text-[7.125rem] leading-[7.875rem]"><?= $title; ?></h1>

			<p class="mt-[0.6875rem] max-w-[31.5rem]"><?= $text; ?></p>

			<div class="flex mt-[4.25rem]">
				<a href="<?= esc_url( $link['url'] ); ?>" class="c-link"><?= $link['label']; ?></a>
			</div>
		</div>

	</div>
</section>
