<?php
/**
 * Template name: Contact
 * @var WP_Post $post
 */
get_header();
?>

<?php get_template_part( 'partials/blocks/page-intro', null, array(
	'title' => 'Vertel ons<br>over uw project',
	'text'  => 'Een vraag, of klaar voor een offerte? Kies hieronder wat past. Wij nemen snel contact met u op.',
) ); ?>

<?php get_template_part( 'partials/blocks/contact', null, array(
	'classes'  => 'mt-[11rem] pb-[14rem]',
	'details'  => array(
		array(
			'label' => 'Adres',
			'lines' => array(
				'Louis Delebecquelaan 34',
				'9051 Sint-Denijs-Westrem',
				'<a class="c-link c-link--sm mt-[1rem]" href="https://maps.google.com/?q=Louis+Delebecquelaan+34+9051+Sint-Denijs-Westrem" target="_blank" rel="noopener">Plan uw route</a>',
			),
		),
		array(
			'label' => 'E-mail',
			'lines' => array( '<a href="mailto:sales@brys-projects.be">sales@brys-projects.be</a>' ),
		),
		array(
			'label' => 'Telefoon',
			'lines' => array( '<a href="tel:+3290000000">+32 9 000 00 00</a>' ),
		),
		array(
			'label' => 'Volg ons',
			'lines' => array(
				'<a href="https://www.instagram.com/" target="_blank" rel="noopener">Instagram</a>',
				'<a href="https://www.linkedin.com/" target="_blank" rel="noopener">LinkedIn</a>',
			),
		),
	),
	'forms'    => array(
		array(
			'id'    => 'vraag',
			'label' => 'Een vraag',
			'text'  => 'Stel uw vraag. Wij antwoorden per e-mail of bellen u terug.',
			'form'  => 'Contact',
		),
		array(
			'id'    => 'offerte',
			'label' => 'Een offerte',
			'text'  => 'Vertel ons kort over uw project. Daarna plannen wij een bezoek ter plaatse. Zo krijgt u een vaste prijs.',
			'form'  => 'Offerte',
		),
	),
	'fallback' => 'Liever mailen? Schrijf naar <a class="underline" href="mailto:sales@brys-projects.be">sales@brys-projects.be</a>.',
) ); ?>

<?php get_footer(); ?>
