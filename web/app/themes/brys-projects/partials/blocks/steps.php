<?php
/**
 * Heading and optional intro text, then the steps in five columns.
 *
 * @var array  $args
 * @var string $title
 * @var string $text     Optional
 * @var array  $link     Optional, array( 'label' => string, 'url' => string )
 * @var array  $steps    array( 'title' => string, 'text' => string )
 * @var string $classes
 */
extract( $args );
$classes = $classes ?? '';
?>

<section class="b-steps <?= $classes; ?>">
	<div class="o-container">

		<div class="o-grid">
			<div class="sm:col-span-7">
				<h2 class="text-[5.25rem] leading-[5.5rem]" data-reveal="lines"><?= $title; ?></h2>
			</div>

			<?php if ( ! empty( $text ) ) : ?>
				<div class="b-steps__intro sm:col-span-3 sm:col-start-10 self-end">
					<p data-reveal="fade"><?= $text; ?></p>

					<?php if ( ! empty( $link ) ) : ?>
						<div class="flex mt-[2.75rem]" data-reveal="fade">
							<a href="<?= esc_url( $link['url'] ); ?>" class="c-link"><?= $link['label']; ?></a>
						</div>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>

		<ol class="b-steps__list grid grid-cols-5 gap-16 mt-[7.875rem]">
			<?php foreach ( $steps as $index => $step ) : ?>
				<li class="b-steps__step pt-[1.5rem] border-t border-ink" data-reveal="fade">
					<p class="b-steps__num"><?= sprintf( '%02d', $index + 1 ); ?></p>
					<h3 class="mt-[2.5rem] text-[1.84375rem] leading-[2.125rem]"><?= $step['title']; ?></h3>
					<p class="mt-[1.5rem] text-[1.1rem] leading-[1.625rem]"><?= $step['text']; ?></p>
				</li>
			<?php endforeach; ?>
		</ol>

	</div>
</section>
