<?php
/**
 * Olijfblok: a sage block inside the container. Large title, a button and the
 * contact details right away.
 */
?>

<section class="b-cta-olijf mt-[12rem] mb-[10rem]" data-reveal-sequence>
	<div class="o-container">
		<div class="b-cta-olijf__block o-grid">

			<div class="b-cta-olijf__head">
				<p class="b-proto-caption" data-reveal="fade">Vrijblijvend bezoek ter plaatse</p>
				<h2 class="b-cta-olijf__title" data-reveal="lines">Klaar voor<br>de eerste <em>stap?</em></h2>
			</div>

			<div class="b-cta-olijf__aside">
				<p data-reveal="fade">Wij komen langs, bekijken de ruimte en tonen stalen. Binnen de week heeft u een vaste prijs.</p>

				<div class="mt-[2.5rem]" data-reveal="fade">
					<a href="/contact" class="b-proto-btn b-proto-btn--ink">Vraag een offerte aan <span class="b-proto-btn__arrow"><?php get_template_part( 'partials/vectors/arrow-diagonal.svg', null, array( 'size' => 13 ) ); ?></span></a>
				</div>

				<dl class="b-cta-olijf__details" data-reveal="fade">
					<div><dt class="b-proto-caption">Bel</dt><dd><a href="tel:+3290000000">+32 9 000 00 00</a></dd></div>
					<div><dt class="b-proto-caption">Mail</dt><dd><a href="mailto:sales@brys-projects.be">sales@brys-projects.be</a></dd></div>
				</dl>
			</div>

		</div>
	</div>
</section>
