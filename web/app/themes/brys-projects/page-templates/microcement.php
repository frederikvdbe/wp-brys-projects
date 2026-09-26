<?php
/**
 * Template name: Microcement
 * @var WP_Post $post
 */
get_header();
?>

<?php get_template_part( 'partials/blocks/showcase', null, array(
	'title'     => 'Naadloos van<br>vloer tot wand',
	'text'      => 'Microcement is een minerale afwerking van twee tot drie millimeter. Wij brengen het met de hand aan op vloeren, wanden, trappen en meubels. Het resultaat is één doorlopend oppervlak, zonder voegen.',
	'link'      => array( 'label' => 'Bekijk onze realisaties', 'url' => '/realisaties' ),
	'image'     => 'toepassingen.jpg',
	'image_alt' => 'Detail van een meubel afgewerkt in microcement',
) ); ?>

<div class="c-panel c-panel--left" style="--panel-inset-bottom: 0">

	<?php get_template_part( 'partials/blocks/lead', null, array(
		'classes' => 'pt-[22rem]',
		'eyebrow' => 'Het materiaal',
		'lead'    => 'Een mengsel van cement, harsen en minerale pigmenten, in dunne lagen met de spaan aangebracht. Elke haal laat een spoor na. Zo zijn geen twee oppervlakken hetzelfde.',
		'columns' => array(
			'Omdat de laag zo dun is, gaat microcement meestal rechtstreeks over uw bestaande tegels of vloer. Er is geen zwaar breekwerk nodig, geen puin en geen lange werf. Deuren en plinten passen vaak gewoon nog.',
			'Na het afwerken sluiten wij het oppervlak af met een beschermende vernis. Die maakt het waterdicht en bestand tegen vlekken. Zo kan microcement ook in de douche, rond het bad en op het keukenblad.',
		),
	) ); ?>

	<?php get_template_part( 'partials/blocks/index-list', null, array(
		'classes' => 'mt-[16rem]',
		'title'   => 'Toepassingen',
		'items'   => array(
			array(
				'title' => 'Vloeren',
				'text'  => 'Eén doorlopende vloer door de hele verdieping, zonder drempels of voegen. Geschikt voor vloerverwarming.',
				'image' => 'toepassingen.jpg',
			),
			array(
				'title' => 'Badkamer en douche',
				'text'  => 'Wanden, vloer en inloopdouche in één materiaal. Zonder voegen is er geen plek waar vuil of kalk zich vastzet.',
				'image' => 'realisatie-badkamers.jpg',
			),
			array(
				'title' => 'Keuken',
				'text'  => 'Werkbladen, spatwanden en eilanden. Hittebestendig en vlekwerend dankzij de afwerklaag.',
				'image' => 'hero.jpg',
			),
			array(
				'title' => 'Wanden',
				'text'  => 'Een zachte, minerale textuur, van woonkamer tot inkomhal. Ook op gyproc en bestaande pleister.',
				'image' => 'realisatie-binnenafwerking.jpg',
			),
			array(
				'title' => 'Trappen',
				'text'  => 'Treden en stootborden in hetzelfde materiaal als de vloer. Zo vormt de trap één geheel met de ruimte.',
				'image' => 'detail-groot.jpg',
			),
			array(
				'title' => 'Meubels en maatwerk',
				'text'  => 'Tafels, banken, wastafels en kasten. Wij werken ook bestaande meubels opnieuw af.',
				'image' => 'realisatie-microcement.jpg',
			),
		),
	) ); ?>

	<?php get_template_part( 'partials/blocks/tones', null, array(
		'classes' => 'mt-[16rem] pb-[14rem]',
		'title'   => 'Kleur en textuur',
		'text'    => 'Wij mengen elke kleur op maat, van kalkwit tot diep grafiet. Glad of met een zichtbare spaanslag. Bij het eerste bezoek brengen wij stalen mee, zodat u de kleur ziet in het licht van uw eigen ruimte.',
		'link'    => array( 'label' => 'Vraag stalen aan', 'url' => '/contact' ),
		'tones'   => array(
			array( 'name' => 'Kalk', 'color' => '#E8E3D8' ),
			array( 'name' => 'Zand', 'color' => '#D5CAB6' ),
			array( 'name' => 'Travertin', 'color' => '#C1B199' ),
			array( 'name' => 'Klei', 'color' => '#A28D76' ),
			array( 'name' => 'Steen', 'color' => '#8B897F' ),
			array( 'name' => 'Grafiet', 'color' => '#4B4741' ),
		),
	) ); ?>

</div>

<?php get_template_part( 'partials/blocks/steps', null, array(
	'classes' => 'mt-[14rem]',
	'title'   => 'Van eerste bezoek<br>tot oplevering',
	'text'    => 'Eén ploeg en één aanspreekpunt. Wij volgen uw project van het eerste gesprek tot de laatste laag vernis.',
	'link'    => array( 'label' => 'Lees de veelgestelde vragen', 'url' => '/veelgestelde-vragen' ),
	'steps'   => array(
		array(
			'title' => 'Bezoek ter plaatse',
			'text'  => 'Wij bekijken de ondergrond, meten op en tonen stalen in uw ruimte. U hoort meteen wat kan en wat niet.',
		),
		array(
			'title' => 'Vaste offerte',
			'text'  => 'Binnen de week ontvangt u een duidelijke offerte, met een vaste prijs en een planning.',
		),
		array(
			'title' => 'Voorbereiding',
			'text'  => 'Wij herstellen en egaliseren de ondergrond. Een primer en een wapeningsnet zorgen dat alles goed hecht.',
		),
		array(
			'title' => 'Aanbrengen',
			'text'  => 'Laag per laag, met de hand. Tussen elke laag laten wij het materiaal drogen en schuren wij het bij.',
		),
		array(
			'title' => 'Oplevering',
			'text'  => 'Een vernis maakt het oppervlak waterdicht. Bij de oplevering leggen wij het onderhoud uit.',
		),
	),
) ); ?>

<?php get_template_part( 'partials/blocks/cta', null, array(
	'classes' => 'mt-[16rem]',
	'title'   => 'Benieuwd wat het<br>in uw ruimte geeft?',
	'link'    => array( 'label' => 'Plan een bezoek ter plaatse', 'url' => '/contact' ),
) ); ?>

<?php get_footer(); ?>
