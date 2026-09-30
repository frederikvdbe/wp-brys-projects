<?php
/**
 * Heading, text and an optional link on the left, a row of color swatches on the right.
 *
 * @var array  $args
 * @var string $title
 * @var string $text
 * @var array  $link     Optional, array( 'label' => string, 'url' => string )
 * @var array  $tones    array( 'name' => string, 'color' => hex string )
 * @var string $classes
 */
extract( $args );
$classes = $classes ?? '';
$link    = $link ?? null;
?>

<section class="b-tones <?= $classes; ?>">
	<div class="o-container o-grid">

		<div class="b-tones__intro sm:col-span-4 self-end">
			<h2 class="text-[2.7125rem] leading-[2.625rem]" data-reveal="lines"><?= $title; ?></h2>
			<p class="mt-[2.25rem]" data-reveal="fade"><?= $text; ?></p>
			<?php if ( $link ) : ?>
				<div class="flex mt-[2.75rem]" data-reveal="fade">
					<a href="<?= esc_url( $link['url'] ); ?>" class="c-link"><?= $link['label']; ?></a>
				</div>
			<?php endif; ?>
		</div>

		<ul class="b-tones__list sm:col-span-7 sm:col-start-6 grid grid-cols-6 gap-[1.25rem]">
			<?php foreach ( $tones as $tone ) : ?>
				<li data-reveal="fade">
					<div class="b-tones__swatch h-[26rem]" style="--tone: <?= $tone['color']; ?>" role="img" aria-label="<?= esc_attr( $tone['name'] ); ?>"></div>
				</li>
			<?php endforeach; ?>
		</ul>

	</div>
</section>
