<?php
/**
 * Afwisselend: one application per row. The photo switches sides, the text sits next to it.
 *
 * @var array $args title, items
 */
$img = get_template_directory_uri() . '/assets/dist/images/';
?>

<section class="b-tp-afw">
	<div class="o-container">

		<h2 class="b-tp-heading" data-reveal="lines"><?= $args['title']; ?></h2>

		<?php foreach ( $args['items'] as $index => $item ) : ?>
			<article class="b-tp-afw__row o-grid <?= $index % 2 ? 'is-flipped' : ''; ?>">
				<div class="b-tp-afw__media" data-reveal="image">
					<img src="<?= $img . $item['image']; ?>" alt="" loading="lazy">
				</div>
				<div class="b-tp-afw__body" data-reveal="fade">
					<p class="b-proto-caption"><?= sprintf( '%02d', $index + 1 ); ?> / <?= sprintf( '%02d', count( $args['items'] ) ); ?></p>
					<h3 class="b-tp-afw__title"><?= $item['title']; ?></h3>
					<p class="b-tp-afw__text"><?= $item['text']; ?></p>
				</div>
			</article>
		<?php endforeach; ?>

	</div>
</section>
