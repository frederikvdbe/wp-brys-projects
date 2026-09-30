<?php
/**
 * Uitklap: a short list of titles. Tap a title to open its photo and text.
 * The first one is open. Opening one closes the others (same name attribute).
 *
 * @var array $args title, items
 */
$img = get_template_directory_uri() . '/assets/dist/images/';
$uid = 'tp-uitklap-' . wp_unique_id();
?>

<section class="b-tp-uitklap">
	<div class="o-container o-grid">

		<h2 class="b-tp-heading b-tp-uitklap__heading" data-reveal="lines"><?= $args['title']; ?></h2>

		<div class="b-tp-uitklap__list" data-reveal="fade">
			<?php foreach ( $args['items'] as $index => $item ) : ?>
				<details class="b-tp-uitklap__item" name="<?= $uid; ?>" <?= $index === 0 ? 'open' : ''; ?>>
					<summary class="b-tp-uitklap__summary">
						<span class="b-proto-caption"><?= sprintf( '%02d', $index + 1 ); ?></span>
						<span class="b-tp-uitklap__title"><?= $item['title']; ?></span>
						<span class="b-tp-uitklap__icon" aria-hidden="true"></span>
					</summary>
					<div class="b-tp-uitklap__body">
						<img src="<?= $img . $item['image']; ?>" alt="" loading="lazy">
						<p><?= $item['text']; ?></p>
					</div>
				</details>
			<?php endforeach; ?>
		</div>

	</div>
</section>
