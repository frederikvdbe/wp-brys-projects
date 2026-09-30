<?php
/**
 * One large image that bleeds to the left or right edge, or sits centred, with an
 * optional caption.
 *
 * @var array  $args
 * @var string $image
 * @var string $image_alt
 * @var string $align    'left' or 'right': the side where the image bleeds to the edge.
 *                       'center': all twelve columns, lower, no bleed
 * @var string $caption  Optional
 * @var bool   $overhang Optional, the image hangs 10rem into the panel below it,
 *                       half its height when centred
 * @var string $classes
 */
extract( $args );
$classes = $classes ?? '';
$align   = $align ?? 'right';
$caption = $caption ?? '';
if ( ! empty( $overhang ) ) {
	$classes .= ' b-figure--overhang';
}
?>

<section class="b-figure b-figure--<?= $align; ?> <?= $classes; ?>">
	<div class="o-container o-grid">
		<figure class="b-figure__image <?= array( 'right' => 'sm:col-span-9 sm:col-start-4', 'left' => 'sm:col-span-9', 'center' => 'sm:col-span-12' )[ $align ]; ?>">
			<div data-reveal="image">
				<img class="w-full h-[52rem] object-cover"
					 src="<?= get_template_directory_uri(); ?>/assets/dist/images/<?= $image; ?>"
					 width="1400" height="832" loading="lazy" alt="<?= esc_attr( $image_alt ?? '' ); ?>">
			</div>

			<?php if ( $caption ) : ?>
				<figcaption class="c-eyebrow mt-[1.25rem]" data-reveal="fade"><?= $caption; ?></figcaption>
			<?php endif; ?>
		</figure>
	</div>
</section>
