<?php
/**
 * Site footer: a small logo, a short line and the email on the left, link columns
 * on the right, a legal row at the bottom.
 *
 * @var array $args
 * @var string $lead
 * @var string $email
 * @var array  $columns  list of array( 'title' => string, 'items' => list of array( 'label', 'url' ) or html strings )
 * @var array  $legal    list of array( 'label', 'url' )
 * @var array  $credits  array( 'label', 'url' )
 * @var string $classes
 */
extract( $args );
$classes = $classes ?? '';
?>

<footer class="b-site-footer <?= $classes; ?>">
	<div class="o-container">
		<div class="o-grid b-site-footer__top">

			<div class="b-site-footer__intro">
				<img class="b-site-footer__logo" src="<?= get_template_directory_uri(); ?>/assets/dist/images/logo-white.png" width="500" height="221" alt="Brys Projects">
				<p class="b-site-footer__lead"><?= $lead; ?></p>
				<a class="b-site-footer__mail" href="mailto:<?= $email; ?>"><?= $email; ?></a>
			</div>

			<?php foreach ( $columns as $column ) : ?>
				<div class="b-site-footer__col">
					<p class="c-eyebrow"><?= $column['title']; ?></p>
					<ul>
						<?php foreach ( $column['items'] as $item ) : ?>
							<li><?= is_array( $item ) ? '<a href="' . esc_url( $item['url'] ) . '">' . $item['label'] . '</a>' : $item; ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endforeach; ?>

		</div>

		<div class="b-site-footer__legal">
			<p>&copy; <?= date( 'Y' ); ?> Brys Projects</p>
			<p class="b-site-footer__legal-links">
				<?php foreach ( $legal as $item ) : ?>
					<a href="<?= esc_url( $item['url'] ); ?>"><?= $item['label']; ?></a>
				<?php endforeach; ?>
			</p>
			<p><a href="<?= esc_url( $credits['url'] ); ?>"><?= $credits['label']; ?></a></p>
		</div>
	</div>
</footer>
