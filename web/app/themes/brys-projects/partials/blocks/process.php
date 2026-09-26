<?php
/**
 * Optional heading, then the steps as full width rows with a rule between them.
 *
 * @var array  $args
 * @var string $title    Optional
 * @var array  $steps    array( 'title' => string, 'text' => string )
 * @var string $classes
 */
extract( $args );
$classes = $classes ?? '';
?>

<section class="b-process <?= $classes; ?>">
	<div class="o-container">

		<?php if ( ! empty( $title ) ) : ?>
			<div class="o-grid">
				<h2 class="sm:col-span-7 text-[5.25rem] leading-[5.5rem]"><?= $title; ?></h2>
			</div>
		<?php endif; ?>

		<ol class="b-process__list <?= ! empty( $title ) ? 'mt-[7.5rem]' : ''; ?> border-b border-ink">
			<?php foreach ( $steps as $index => $step ) : ?>
				<li class="b-process__item o-grid py-[3.5rem] border-t border-ink">
					<p class="c-eyebrow sm:col-span-2 pt-[1rem]">Stap <?= sprintf( '%02d', $index + 1 ); ?></p>
					<h3 class="sm:col-span-4 sm:col-start-3 text-[3rem] leading-[3.5rem]"><?= $step['title']; ?></h3>
					<p class="b-process__text sm:col-span-4 sm:col-start-8 pt-[0.625rem] text-[1.1rem] leading-[1.625rem]"><?= $step['text']; ?></p>
				</li>
			<?php endforeach; ?>
		</ol>

	</div>
</section>
