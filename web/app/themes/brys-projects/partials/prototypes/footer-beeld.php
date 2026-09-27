<?php
/**
 * Beeld: a photo in the grid on the left that sticks out above the footer. Logo,
 * address and links on the right.
 */
extract( $args );
?>

<footer class="b-foot-beeld">
	<div class="o-container">

		<div class="o-grid b-foot-beeld__grid">

			<div class="b-foot-beeld__image" data-reveal="image">
				<img src="<?= get_template_directory_uri(); ?>/assets/dist/images/detail-zwembad.jpg" alt="" loading="lazy">
			</div>

			<div class="b-foot-beeld__content">

				<img class="b-foot-beeld__logo" src="<?= get_template_directory_uri(); ?>/assets/dist/images/logo-white.png" width="500" height="221" alt="Brys Projects">

				<p class="b-foot-beeld__lead">Wij werken in heel Oost- en West-Vlaanderen. Een bezoek ter plaatse is gratis.</p>

				<div class="b-foot-beeld__cols">
					<div>
						<p class="b-proto-caption">Contact</p>
						<ul>
							<li><a href="mailto:<?= $email; ?>"><?= $email; ?></a></li>
							<li><a href="tel:<?= $tel; ?>"><?= $phone; ?></a></li>
							<?php foreach ( $address as $line ) : ?>
								<li><?= $line; ?></li>
							<?php endforeach; ?>
						</ul>
					</div>

					<div>
						<p class="b-proto-caption">Diensten</p>
						<ul>
							<?php foreach ( $diensten as $item ) : ?>
								<li><a href="<?= $item['url']; ?>"><?= $item['label']; ?></a></li>
							<?php endforeach; ?>
						</ul>
					</div>

					<div>
						<p class="b-proto-caption">Brys</p>
						<ul>
							<?php foreach ( $pages as $item ) : ?>
								<li><a href="<?= $item['url']; ?>"><?= $item['label']; ?></a></li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>

			</div>

		</div>

		<div class="b-foot-beeld__legal">
			<p>&copy; <?= $year; ?> Brys Projects</p>
			<p class="b-foot-beeld__legal-links">
				<?php foreach ( $legal as $item ) : ?>
					<a href="<?= $item['url']; ?>"><?= $item['label']; ?></a>
				<?php endforeach; ?>
			</p>
			<p><a href="<?= $credits['url']; ?>"><?= $credits['label']; ?></a></p>
		</div>

	</div>
</footer>
