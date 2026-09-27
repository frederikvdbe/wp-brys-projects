<?php
/**
 * Olijf: a dark brown block. The email address is the largest element and a link.
 */
extract( $args );
?>

<footer class="b-foot-olijf">
	<div class="o-container">

		<p class="b-proto-caption">Een vraag of een project? Mail ons.</p>
		<a class="b-foot-olijf__mail" href="mailto:<?= $email; ?>">
			<span class="b-foot-olijf__mail-text"><?= $email; ?></span>
		</a>

		<div class="o-grid b-foot-olijf__row">

			<div class="b-foot-olijf__col">
				<p class="b-proto-caption">Bel</p>
				<p><a href="tel:<?= $tel; ?>"><?= $phone; ?></a></p>
			</div>

			<div class="b-foot-olijf__col">
				<p class="b-proto-caption">Bezoek</p>
				<p><?= implode( '<br>', $address ); ?></p>
			</div>

			<div class="b-foot-olijf__col">
				<p class="b-proto-caption">Diensten</p>
				<ul>
					<?php foreach ( $diensten as $item ) : ?>
						<li><a href="<?= $item['url']; ?>"><?= $item['label']; ?></a></li>
					<?php endforeach; ?>
				</ul>
			</div>

			<div class="b-foot-olijf__col">
				<p class="b-proto-caption">Brys</p>
				<ul>
					<?php foreach ( $pages as $item ) : ?>
						<li><a href="<?= $item['url']; ?>"><?= $item['label']; ?></a></li>
					<?php endforeach; ?>
				</ul>
			</div>

		</div>

		<div class="b-foot-olijf__legal">
			<img src="<?= get_template_directory_uri(); ?>/assets/dist/images/logo-white.png" width="500" height="221" alt="Brys Projects">
			<p class="b-foot-olijf__legal-links">
				<span>&copy; <?= $year; ?></span>
				<?php foreach ( $legal as $item ) : ?>
					<a href="<?= $item['url']; ?>"><?= $item['label']; ?></a>
				<?php endforeach; ?>
				<a href="<?= $credits['url']; ?>"><?= $credits['label']; ?></a>
			</p>
		</div>

	</div>
</footer>
