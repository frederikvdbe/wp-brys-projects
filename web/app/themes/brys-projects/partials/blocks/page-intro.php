<?php
/**
 * Page title on the left, intro text on the right. The label and count above the
 * title are optional.
 *
 * @var array  $args
 * @var string $eyebrow  Optional
 * @var int    $count    Optional
 * @var string $title
 * @var string $text     Optional
 * @var string $spacing  Optional top padding class, default pt-[11.5rem]
 * @var string $classes
 */
extract( $args );
$classes = $classes ?? '';
$spacing = $spacing ?? 'pt-[11.5rem]';
?>

<section class="b-page-intro <?= $classes; ?>">
	<div class="o-container o-grid <?= $spacing; ?>">

		<div class="sm:col-span-8">
			<?php if ( ! empty( $eyebrow ) ) : ?>
				<p class="c-eyebrow flex gap-[0.75rem] mb-[2rem]" data-reveal="fade">
					<?= $eyebrow; ?>
					<?php if ( ! empty( $count ) ) : ?>
						<span>(<?= sprintf( '%02d', $count ); ?>)</span>
					<?php endif; ?>
				</p>
			<?php endif; ?>
			<h1 class="text-[7.125rem] leading-[7.875rem]" data-reveal="lines"><?= $title; ?></h1>
		</div>

		<?php if ( ! empty( $text ) ) : ?>
			<div class="b-page-intro__text sm:col-span-3 sm:col-start-10 self-end">
				<p data-reveal="fade"><?= $text; ?></p>
			</div>
		<?php endif; ?>

	</div>
</section>
