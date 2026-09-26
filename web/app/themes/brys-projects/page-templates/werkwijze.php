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

<?php get_template_part( 'partials/blocks/statement', null, array(
	'classes'   => 'mt-[16rem]',
	'statement' => 'Wat wij afspreken,<br>zetten wij op papier.',
	'pillars'   => array(
		array(
			'number' => '01',
			'title'  => 'Vaste prijs',
			'text'   => 'De prijs in de offerte is de prijs die u betaalt. Wilt u tijdens de werken iets extra, dan krijgt u eerst een prijs. Wij starten pas na uw akkoord.',
		),
		array(
			'number' => '02',
			'title'  => 'Vaste planning',
			'text'   => 'Bij de offerte krijgt u een startdatum en de duur van de werken. Verandert er iets, dan hoort u het van ons, niet achteraf.',
		),
		array(
			'number' => '03',
			'title'  => 'Nette werf',
			'text'   => 'Wij dekken vloeren en meubels af en ruimen elke dag op. Zo kunt u tijdens de werken gewoon thuis blijven wonen.',
		),
	),
) ); ?>

<?php get_template_part( 'partials/blocks/faq', null, array(
	'classes' => 'mt-[16rem]',
	'title'   => 'Praktisch',
	'text'    => 'De vragen die wij het vaakst krijgen voor de start van een project.',
	'link'    => array( 'label' => 'Alle veelgestelde vragen', 'url' => '/veelgestelde-vragen' ),
	'items'   => array(
		array(
			'question' => 'Wat kost het eerste bezoek?',
			'answer'   => 'Niets. Het bezoek ter plaatse en de offerte zijn gratis en zonder verplichting.',
		),
		array(
			'question' => 'Hoeveel btw betaal ik?',
			'answer'   => 'Is uw woning ouder dan tien jaar en woont u er zelf in, dan betaalt u meestal 6% btw in plaats van 21%. Dat geldt voor het werk én het materiaal. Wij kijken dit na bij het bezoek en zetten het juiste tarief op de offerte.',
		),
		array(
			'question' => 'Kan ik thuis blijven wonen tijdens de werken?',
			'answer'   => 'Meestal wel. Wij spreken vooraf af welke ruimtes wanneer niet bruikbaar zijn. Bij een vloer in microcement kunt u enkele dagen niet over die zone lopen. Dat staat in de planning.',
		),
		array(
			'question' => 'Hoe snel kunnen jullie starten?',
			'answer'   => 'Dat hangt af van onze planning en van de grootte van uw project. Bij de offerte krijgt u een concrete startdatum.',
		),
		array(
			'question' => 'Werken jullie samen met mijn architect?',
			'answer'   => 'Graag. Wij stemmen af met uw architect of interieurontwerper over details, materialen en timing. U houdt één aanspreekpunt voor de afwerking.',
		),
	),
) ); ?>

<?php get_template_part( 'partials/blocks/cta', null, array(
	'classes' => 'mt-[16rem]',
	'title'   => 'Klaar voor<br>de eerste stap?',
	'link'    => array( 'label' => 'Vraag een offerte aan', 'url' => '/contact#offerte' ),
) ); ?>

<?php get_footer(); ?>
