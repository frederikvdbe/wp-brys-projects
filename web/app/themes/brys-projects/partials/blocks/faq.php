<?php
/**
 * Sticky heading on the left, questions that open and close on the right. The
 * questions share one name, so only one is open at a time.
 *
 * @var array  $args
 * @var string $title
 * @var string $text     Optional
 * @var array  $link     Optional, array( 'label' => string, 'url' => string )
 * @var array  $items    array( 'question' => string, 'answer' => string )
 * @var string $classes
 */
extract( $args );
$classes = $classes ?? '';
?>

<section class="b-faq <?= $classes; ?>">
	<div class="o-container o-grid">

		<div class="b-faq__intro sm:col-span-4 self-start sticky top-[4rem]">
			<h2 class="text-[5.25rem] leading-[5.5rem]" data-reveal="lines"><?= $title; ?></h2>
			<?php if ( ! empty( $text ) ) : ?>
				<p class="mt-[2.25rem] max-w-[22.625rem]" data-reveal="fade"><?= $text; ?></p>
			<?php endif; ?>

			<?php if ( ! empty( $link ) ) : ?>
				<div class="flex mt-[2.75rem]" data-reveal="fade">
					<a href="<?= esc_url( $link['url'] ); ?>" class="c-link"><?= $link['label']; ?></a>
				</div>
			<?php endif; ?>
		</div>

		<div class="b-faq__list sm:col-span-6 sm:col-start-7 border-b border-ink">
			<?php foreach ( $items as $item ) : ?>
				<details class="b-faq__item border-t border-ink" name="faq" data-reveal="fade">
					<summary class="b-faq__question flex items-center justify-between gap-16 py-[2.25rem] cursor-pointer">
						<span class="b-faq__label font-display text-[1.84375rem] leading-[2.125rem]"><?= $item['question']; ?></span>
						<span class="b-faq__icon"></span>
					</summary>
					<p class="b-faq__answer pb-[2.75rem] pr-[8.875rem] text-[1.1rem] leading-[1.625rem]"><?= $item['answer']; ?></p>
				</details>
			<?php endforeach; ?>
		</div>

	</div>
</section>
