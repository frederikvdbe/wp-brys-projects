<?php
/**
 * Strook: a row of cards to swipe sideways. Arrows for desktop (assets/js/prototypes.js).
 *
 * @var array $args title, items
 */
$img = get_template_directory_uri() . '/assets/dist/images/';
?>

<section class="b-tp-strook js-tp-strook">
	<div class="o-container b-tp-strook__head">
		<h2 class="b-tp-heading" data-reveal="lines"><?= $args['title']; ?></h2>

		<div class="b-tp-strook__controls" data-reveal="fade">
			<span class="b-proto-caption"><span class="js-tp-strook-count">01</span> / <?= sprintf( '%02d', count( $args['items'] ) ); ?></span>
			<button type="button" class="b-tp-strook__arrow js-tp-strook-prev" aria-label="Vorige">&larr;</button>
			<button type="button" class="b-tp-strook__arrow js-tp-strook-next" aria-label="Volgende">&rarr;</button>
		</div>
	</div>

	<ul class="b-tp-strook__track js-tp-strook-track" data-reveal="fade">
		<?php foreach ( $args['items'] as $index => $item ) : ?>
			<li class="b-tp-strook__card">
				<img src="<?= $img . $item['image']; ?>" alt="" loading="lazy">
				<p class="b-tp-strook__num b-proto-caption"><?= sprintf( '%02d', $index + 1 ); ?></p>
				<h3 class="b-tp-strook__title"><?= $item['title']; ?></h3>
				<p class="b-tp-strook__text"><?= $item['text']; ?></p>
			</li>
		<?php endforeach; ?>
	</ul>
</section>
