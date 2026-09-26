<?php
/**
 * List of rows with a large title and a short text. On devices with a mouse, a
 * photo follows the cursor while it is over a row (assets/js/index-preview.js).
 *
 * @var array  $args
 * @var string $title
 * @var array  $items    array( 'title' => string, 'text' => string, 'image' => string )
 * @var string $classes
 */
extract( $args );
$classes = $classes ?? '';
?>

<section class="b-index js-index <?= $classes; ?>">
	<div class="o-container">

		<h2 class="text-[2.7125rem] leading-[2.625rem]" data-reveal="lines"><?= $title; ?></h2>

		<ul class="b-index__list mt-[5.0625rem] border-b border-ink">
			<?php foreach ( $items as $index => $item ) : ?>
				<li class="b-index__row js-index-row o-grid items-baseline py-[2.75rem] border-t border-ink" data-index="<?= $index; ?>" data-reveal="fade">
					<h3 class="b-index__title sm:col-span-7 text-[3.5rem] leading-[3.75rem]"><?= $item['title']; ?></h3>
					<p class="sm:col-span-4 sm:col-start-8 text-[1.1rem] leading-[1.625rem]"><?= $item['text']; ?></p>
				</li>
			<?php endforeach; ?>
		</ul>

	</div>

	<div class="b-index__preview js-index-preview" aria-hidden="true">
		<?php foreach ( $items as $item ) : ?>
			<img src="<?= get_template_directory_uri(); ?>/assets/dist/images/<?= $item['image']; ?>" alt="">
		<?php endforeach; ?>
	</div>
</section>
