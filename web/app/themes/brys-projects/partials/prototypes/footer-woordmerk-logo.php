<?php
/**
 * Woordmerk met logo: the logo with the address next to it on the left, link
 * columns on the right, a legal row at the bottom.
 */
extract( $args );
?>

<footer class="b-foot-woord b-foot-woord--logo">
	<div class="o-container">
		<div class="o-grid b-foot-woord__top">

			<img class="b-foot-woord__logo" src="<?= get_template_directory_uri(); ?>/assets/dist/images/logo-white.png" width="500" height="221" alt="Brys Projects">

			<div class="b-foot-woord__col">
				<p class="b-proto-caption">Bezoek</p>
				<ul>
					<?php foreach ( $address as $line ) : ?>
						<li><?= $line; ?></li>
					<?php endforeach; ?>
					<li><a href="tel:<?= $tel; ?>"><?= $phone; ?></a></li>
				</ul>
			</div>

			<div class="b-foot-woord__col">
				<p class="b-proto-caption">Diensten</p>
				<ul>
					<?php foreach ( $diensten as $item ) : ?>
						<li><a href="<?= $item['url']; ?>"><?= $item['label']; ?></a></li>
					<?php endforeach; ?>
				</ul>
			</div>

			<div class="b-foot-woord__col">
				<p class="b-proto-caption">Brys</p>
				<ul>
					<?php foreach ( $pages as $item ) : ?>
						<li><a href="<?= $item['url']; ?>"><?= $item['label']; ?></a></li>
					<?php endforeach; ?>
				</ul>
			</div>

		</div>

		<div class="b-foot-woord__legal">
			<p>&copy; <?= $year; ?> Brys Projects</p>
			<p class="b-foot-woord__legal-links">
				<?php foreach ( $legal as $item ) : ?>
					<a href="<?= $item['url']; ?>"><?= $item['label']; ?></a>
				<?php endforeach; ?>
			</p>
			<p><a href="<?= $credits['url']; ?>"><?= $credits['label']; ?></a></p>
		</div>
	</div>

</footer>
