<?php
/**
 * Lijst met beeld: the same list, with a small photo on every row that is always in view.
 *
 * @var array $args title, items
 */
$img = get_template_directory_uri() . '/assets/dist/images/';
?>

<section class="b-tp-lijst">
	<div class="o-container">

		<h2 class="b-tp-heading" data-reveal="lines"><?= $args['title']; ?></h2>

		<ul class="b-tp-lijst__list">
			<?php foreach ( $args['items'] as $index => $item ) : ?>
				<li class="b-tp-lijst__row o-grid" data-reveal="fade">
					<span class="b-tp-lijst__num b-proto-caption"><?= sprintf( '%02d', $index + 1 ); ?></span>
					<img class="b-tp-lijst__image" src="<?= $img . $item['image']; ?>" alt="" loading="lazy">
					<h3 class="b-tp-lijst__title"><?= $item['title']; ?></h3>
					<p class="b-tp-lijst__text"><?= $item['text']; ?></p>
				</li>
			<?php endforeach; ?>
		</ul>

	</div>
</section>
