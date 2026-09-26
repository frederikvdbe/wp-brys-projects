<?php
/**
 * Template name: Werkwijze
 * @var WP_Post $post
 */
get_header();
?>

<?php get_template_part( 'partials/blocks/page-intro', null, array(
	'title' => 'Onze<br>werkwijze',
	'text'  => 'Eén ploeg en één aanspreekpunt, van het eerste gesprek tot de oplevering. Zo weet u altijd waar u staat.',
) ); ?>

<?php get_template_part( 'partials/blocks/figure', null, array(
	'classes'   => 'mt-[9rem]',
	'image'     => 'detail-groot.jpg',
	'image_alt' => 'Badkamer in travertin',
	'align'     => 'right',
) ); ?>

<?php get_template_part( 'partials/blocks/process', null, array(
	'classes' => 'mt-[14rem]',
	'title'   => 'In vijf<br>stappen',
	'steps'   => array(
		array(
			'title' => 'Kennismaking',
			'text'  => 'U vertelt ons over uw project, telefonisch of via het formulier. Wij luisteren naar uw plannen en uw wensen.',
		),
		array(
			'title' => 'Bezoek ter plaatse',
			'text'  => 'Wij bekijken de ruimte en de ondergrond, meten op en tonen stalen. U hoort meteen wat kan en wat niet.',
		),
		array(
			'title' => 'Vaste offerte',
			'text'  => 'Binnen de week ontvangt u een duidelijke offerte, met een vaste prijs en een planning.',
		),
		array(
			'title' => 'Uitvoering',
			'text'  => 'Onze eigen ploeg voert de werken uit. Uw aanspreekpunt bewaakt de planning en het budget.',
		),
		array(
			'title' => 'Oplevering',
			'text'  => 'Samen lopen wij alles na. U krijgt uitleg over het onderhoud, en ook na de werken blijven wij bereikbaar.',
		),
	),
) ); ?>

<?php get_template_part( 'partials/blocks/cta', null, array(
	'classes' => 'mt-[16rem]',
	'title'   => 'Klaar voor<br>de eerste stap?',
	'link'    => array( 'label' => 'Vraag een offerte aan', 'url' => '/contact#offerte' ),
) ); ?>

<?php get_footer(); ?>
