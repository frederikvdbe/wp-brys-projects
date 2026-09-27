<?php
/**
 * Twee keuzes: a question or a quote. The sage card is the main action.
 */
?>

<section class="b-cta-keuze mt-[14rem] mb-[12rem]" data-reveal-sequence>
	<div class="o-container">
		<h2 class="b-cta-keuze__title" data-reveal="lines">Hoe kunnen wij<br>u <em>helpen?</em></h2>

		<div class="b-cta-keuze__cards">
			<a href="/contact" class="b-cta-keuze__card b-cta-keuze__card--olive" data-reveal="fade">
				<span class="b-proto-caption">01 &mdash; Offerte</span>
				<span class="b-cta-keuze__name">Ik ben klaar<br>voor een offerte</span>
				<span class="b-cta-keuze__text">Wij plannen een bezoek ter plaatse. Binnen de week heeft u een vaste prijs.</span>
				<span class="b-proto-btn b-proto-btn--ink">Plan een bezoek <span class="b-proto-btn__arrow"><?php get_template_part( 'partials/vectors/arrow-diagonal.svg', null, array( 'size' => 13 ) ); ?></span></span>
			</a>

			<a href="/contact" class="b-cta-keuze__card" data-reveal="fade">
				<span class="b-proto-caption">02 &mdash; Vraag</span>
				<span class="b-cta-keuze__name">Ik heb eerst<br>een vraag</span>
				<span class="b-cta-keuze__text">Over materiaal, prijs of planning. Wij nemen snel contact met u op.</span>
				<span class="c-link self-start">Stel uw vraag</span>
			</a>
		</div>
	</div>
</section>
