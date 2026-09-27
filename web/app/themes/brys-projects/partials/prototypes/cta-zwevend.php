<?php
/**
 * Zwevende knop: a small sage button that shows up bottom right once the visitor
 * scrolls past the header, on every page. The page ends with a short closing line.
 */
?>

<a href="/contact" class="b-cta-float js-cta-float">
	<span class="b-cta-float__dot"></span>
	Vraag een offerte
	<span class="b-proto-btn__arrow"><?php get_template_part( 'partials/vectors/arrow-diagonal.svg', null, array( 'size' => 13 ) ); ?></span>
</a>

<section class="b-cta-slot mt-[14rem] mb-[12rem]" data-reveal-sequence>
	<div class="o-container b-cta-slot__inner">
		<h2 class="b-cta-slot__title" data-reveal="lines">Zullen wij <em>kennismaken?</em></h2>
		<div class="flex items-center gap-[2.5rem]" data-reveal="fade">
			<a href="/contact" class="b-proto-btn b-proto-btn--olive">Neem contact op <span class="b-proto-btn__arrow"><?php get_template_part( 'partials/vectors/arrow-diagonal.svg', null, array( 'size' => 13 ) ); ?></span></a>
		</div>
	</div>
</section>
