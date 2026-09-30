<?php
/**
 * Raster: six cards in three columns. Photo, number, title and text.
 *
 * @var array $args title, items
 */
$img = get_template_directory_uri() . '/assets/dist/images/';
?>

<section class="b-tp-raster" data-reveal-sequence>
	<div class="o-container">

		<h2 class="b-tp-heading" data-reveal="lines"><?= $args['title']; ?></h2>

		<ul class="b-tp-raster__grid o-grid">
			<?php foreach ( $args['items'] as $index => $item ) : ?>
				<li class="b-tp-raster__card">
					<div class="b-tp-raster__media" data-reveal="image">
						<img src="<?= $img . $item['image']; ?>" alt="" loading="lazy">
					</div>
					<div data-reveal="fade">
						<p class="b-tp-raster__num b-proto-caption"><?= sprintf( '%02d', $index + 1 ); ?></p>
						<h3 class="b-tp-raster__title"><?= $item['title']; ?></h3>
						<p class="b-tp-raster__text"><?= $item['text']; ?></p>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>

	</div>
</section>
