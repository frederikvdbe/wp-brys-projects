<?php
/**
 * Template name: Werkwijze
 * @var WP_Post $post
 */
get_header();
?>

<?php get_template_part( 'partials/blocks/page-intro', null, array(
	'title' => 'Onze<br>werkwijze',
	'text'  => 'Vijf duidelijke stappen en één vast aanspreekpunt. Zo weet u altijd waar u staat.',
) ); ?>

<?php get_template_part( 'partials/blocks/figure', null, array(
	'classes'   => 'mt-[9rem]',
	'image'     => 'detail-groot.jpg',
	'image_alt' => 'Badkamer in travertin',
	'align'     => 'right',
	'overhang'  => true,
) ); ?>

<div class="c-panel c-panel--left" style="--panel-inset-bottom: 0">

	<?php get_template_part( 'partials/blocks/process', null, array(
		'classes' => 'pt-[24rem]',
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
				'title' => 'Offerte met vaste prijs',
				'text'  => 'Uiterlijk een week na het bezoek ligt uw offerte klaar. Alles staat erin: werk, materiaal, prijs en planning.',
			),
			array(
				'title' => 'Uitvoering',
				'text'  => 'Wij voeren de werken zelf uit. Uw aanspreekpunt bewaakt de planning en het budget.',
			),
			array(
				'title' => 'Oplevering',
				'text'  => 'Samen lopen wij alles na. U krijgt uitleg over het onderhoud. Ook na de werken blijven wij bereikbaar.',
			),
		),
	) ); ?>

	<?php get_template_part( 'partials/blocks/statement', null, array(
		'classes'   => 'mt-[16rem] pb-[14rem]',
		'statement' => 'Wat wij afspreken,<br>zetten wij op papier.',
		'pillars'   => array(
			array(
				'number' => '01',
				'title'  => 'Vaste prijs',
				'text'   => 'De prijs in de offerte is de prijs die u betaalt. Wilt u tijdens de werken iets extra laten doen, dan krijgt u eerst een prijs. Pas na uw akkoord voeren wij het uit.',
			),
			array(
				'number' => '02',
				'title'  => 'Vaste planning',
				'text'   => 'Bij de offerte krijgt u een startdatum en de duur van de werken. Verandert er iets, dan hoort u het meteen van ons, niet achteraf.',
			),
			array(
				'number' => '03',
				'title'  => 'Nette werf',
				'text'   => 'Wij dekken vloeren en meubels af en ruimen elke dag op. Zo kunt u tijdens de werken meestal thuis blijven wonen.',
			),
		),
	) ); ?>

</div>

<?php get_template_part( 'partials/blocks/faq', null, array(
	'classes' => 'mt-[14rem]',
	'title'   => 'Praktisch',
	'text'    => 'De vragen die wij het vaakst krijgen voor de start van een project.',
	'link'    => array( 'label' => 'Lees alle veelgestelde vragen', 'url' => '/veelgestelde-vragen' ),
	'items'   => array(
		array(
			'question' => 'Wat kost het eerste bezoek?',
			'answer'   => 'Niets. Het bezoek ter plaatse en de offerte zijn gratis en vrijblijvend.',
		),
		array(
			'question' => 'Hoeveel btw betaal ik?',
			'answer'   => 'Is uw woning minstens tien jaar in gebruik? En blijft ze na de werken vooral een privéwoning? Dan betaalt u meestal 6% btw in plaats van 21%. Dat geldt voor het werk én voor het materiaal dat wij leveren en plaatsen. Wij kijken dit na bij het bezoek en zetten het juiste tarief op de offerte.',
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
			'answer'   => 'Graag. Wij stemmen details, materialen en planning af met uw architect of interieurontwerper. Zo sluit de afwerking aan op het ontwerp.',
		),
	),
) ); ?>

<?php get_template_part( 'partials/blocks/cta', null, array(
	'classes' => 'mt-[16rem]',
	'title'   => 'Klaar voor<br>de eerste stap?',
	'link'    => array( 'label' => 'Vraag een offerte aan', 'url' => '/contact#offerte' ),
) ); ?>

<?php get_footer(); ?>
