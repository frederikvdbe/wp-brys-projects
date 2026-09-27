<?php
/**
 * Grote regel: the whole row is the link. On hover a sage fill slides in behind it.
 */
?>

<section class="b-cta-regel mt-[14rem] mb-[12rem]" data-reveal-sequence>
	<div class="o-container">
		<div class="b-cta-regel__top" data-reveal="fade">
			<p class="b-proto-caption">Volgende stap</p>
			<p class="b-cta-regel__note">Gratis bezoek en offerte, zonder verplichting.</p>
		</div>
	</div>

	<a href="/contact" class="b-cta-regel__link">
		<span class="o-container b-cta-regel__inner">
			<span class="b-cta-regel__label" data-reveal="lines">Plan een bezoek <em>ter plaatse</em></span>
			<span class="b-cta-regel__arrow"><?php get_template_part( 'partials/vectors/arrow-diagonal.svg', null, array( 'size' => 56 ) ); ?></span>
		</span>
	</a>

	<a href="/contact" class="b-cta-regel__link b-cta-regel__link--small">
		<span class="o-container b-cta-regel__inner">
			<span class="b-cta-regel__label" data-reveal="lines">Of stel ons een vraag</span>
			<span class="b-cta-regel__arrow"><?php get_template_part( 'partials/vectors/arrow-diagonal.svg', null, array( 'size' => 32 ) ); ?></span>
		</span>
	</a>
</section>
