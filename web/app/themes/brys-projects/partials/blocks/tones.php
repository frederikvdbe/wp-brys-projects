<?php
/**
 * Heading, text and link on the left, a row of color swatches on the right.
 *
 * @var array  $args
 * @var string $title
 * @var string $text
 * @var array  $link     array( 'label' => string, 'url' => string )
 * @var array  $tones    array( 'name' => string, 'color' => hex string )
 * @var string $classes
 */
extract( $args );
$classes = $classes ?? '';
?>

<section class="b-tones <?= $classes; ?>">
	<div class="o-container o-grid">

		<div class="b-tones__intro sm:col-span-4 self-end">
			<h2 class="text-[2.7125rem] leading-[2.625rem]" data-reveal="lines"><?= $title; ?></h2>
			<p class="mt-[2.25rem]" data-reveal="fade"><?= $text; ?></p>
			<div class="flex mt-[2.75rem]" data-reveal="fade">
				<a href="<?= esc_url( $link['url'] ); ?>" class="c-link"><?= $link['label']; ?></a>
			</div>
		</div>

		<ul class="b-tones__list sm:col-span-7 sm:col-start-6 grid grid-cols-6 gap-[1.25rem]">
			<?php foreach ( $tones as $index => $tone ) : ?>
				<li data-reveal="fade">
					<div class="b-tones__swatch h-[26rem]" style="--tone: <?= $tone['color']; ?>"></div>
					<p class="mt-[1.25rem] pb-[0.875rem] border-b border-ink font-display italic text-[1.25rem] leading-[1.25rem]"><?= $tone['name']; ?></p>
					<p class="c-eyebrow mt-[0.75rem]">BP <?= sprintf( '%02d', $index + 1 ); ?></p>
				</li>
			<?php endforeach; ?>
		</ul>

	</div>
</section>
