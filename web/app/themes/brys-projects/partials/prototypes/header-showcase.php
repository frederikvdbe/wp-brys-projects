<?php
/**
 * Showcase, tighter: large title, then an image to the left edge with the text
 * at the top next to it.
 */
?>

<section class="b-showcase-tight" data-reveal-sequence>
	<div class="o-container o-grid">
		<h1 class="b-showcase-tight__title" data-reveal="lines">Naadloos van<br>vloer tot wand</h1>
	</div>

	<div class="o-container o-grid b-showcase-tight__row">
		<div class="b-showcase-tight__image" data-reveal="image">
			<img src="<?= get_template_directory_uri(); ?>/assets/dist/images/toepassingen.jpg" width="1212" height="914" alt="Detail van een meubel afgewerkt in microcement">
		</div>

		<div class="b-showcase-tight__text">
			<p data-reveal="fade">Microcement is een minerale afwerking van twee tot drie millimeter. Wij brengen het met de hand aan op vloeren, wanden, trappen en meubels. Het resultaat is één doorlopend oppervlak, zonder voegen.</p>
			<div class="flex mt-[2.5rem]" data-reveal="fade">
				<a href="/realisaties" class="c-link">Bekijk onze realisaties</a>
			</div>
		</div>
	</div>
</section>
