<?php
/**
 * Page title on the left, intro text on the right. The label and count above the
 * title are optional.
 *
 * @var array  $args
 * @var string $eyebrow  Optional
 * @var int    $count    Optional
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
			<?php if ( ! empty( $eyebrow ) ) : ?>
				<p class="c-eyebrow flex gap-[0.75rem] mb-[2rem]">
					<?= $eyebrow; ?>
					<?php if ( ! empty( $count ) ) : ?>
						<span>(<?= sprintf( '%02d', $count ); ?>)</span>
					<?php endif; ?>
				</p>
			<?php endif; ?>
			<h1 class="text-[7.125rem] leading-[7.875rem]"><?= $title; ?></h1>
		</div>

		<div class="sm:col-span-3 sm:col-start-10 self-end">
			<p><?= $text; ?></p>
		</div>

	</div>
</section>
