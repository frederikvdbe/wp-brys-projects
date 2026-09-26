<?php
/**
 * Page title with an eyebrow and count on the left, intro text on the right.
 *
 * @var array  $args
 * @var string $eyebrow
 * @var int    $count
 * @var string $title
 * @var string $text
 * @var string $classes
 */
extract( $args );
$classes = $classes ?? '';
?>

<section class="b-page-intro <?= $classes; ?>">
	<div class="o-container o-grid pt-[11.5rem]">

		<div class="sm:col-span-8">
			<p class="c-eyebrow flex gap-[0.75rem]">
				<?= $eyebrow; ?>
				<?php if ( ! empty( $count ) ) : ?>
					<span>(<?= sprintf( '%02d', $count ); ?>)</span>
				<?php endif; ?>
			</p>
			<h1 class="mt-[2rem] text-[7.125rem] leading-[7.875rem]"><?= $title; ?></h1>
		</div>

		<div class="sm:col-span-3 sm:col-start-10 self-end">
			<p><?= $text; ?></p>
		</div>

	</div>
</section>
