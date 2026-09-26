<?php
/**
 * Small label on the left, a large lead sentence, and two text columns below it.
 *
 * @var array  $args
 * @var string $eyebrow
 * @var string $lead
 * @var array  $columns  List of paragraphs, one per column
 * @var string $classes
 */
extract( $args );
$classes = $classes ?? '';
?>

<section class="b-lead <?= $classes; ?>">
	<div class="o-container o-grid">

		<p class="c-eyebrow sm:col-span-2 pt-[1.25rem]" data-reveal="fade"><?= $eyebrow; ?></p>

		<p class="b-lead__text sm:col-span-8 sm:col-start-4 font-display text-[3.25rem] leading-[4.125rem] font-[350]" data-reveal="lines"><?= $lead; ?></p>

		<?php foreach ( $columns as $index => $column ) : ?>
			<p class="b-lead__column sm:col-span-4 <?= $index === 0 ? 'sm:col-start-4' : ''; ?> mt-[4.5rem] text-[1.1rem] leading-[1.625rem]" data-reveal="fade"><?= $column; ?></p>
		<?php endforeach; ?>

	</div>
</section>
