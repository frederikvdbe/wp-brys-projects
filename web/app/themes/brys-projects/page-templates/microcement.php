<?php
/**
 * Template name: Microcement
 * @var WP_Post $post
 */
get_header();
?>

<?php get_template_part( 'partials/blocks/showcase', null, array(
	'title'     => 'Naadloos van<br>vloer tot wand',
	'text'      => 'Microcement is een minerale afwerking van meestal twee tot drie millimeter dik. Wij brengen het met de hand aan op vloeren, wanden, trappen en meubels. Het resultaat is één doorlopend oppervlak, zonder voegen.',
	'link'      => array( 'label' => 'Bekijk onze realisaties', 'url' => '/realisaties' ),
	'image'     => 'toepassingen.jpg',
	'image_alt' => 'Detail van een meubel afgewerkt in microcement',
	'image_small' => array( 'file' => 'detail-zwembad.jpg', 'alt' => 'Binnenzwembad met betonnen balken' ),
) ); ?>

<div class="c-panel c-panel--left" style="--panel-inset-bottom: 0">

	<?php get_template_part( 'partials/blocks/lead', null, array(
		'classes' => 'b-lead--left pt-[32.15625rem]',
		'eyebrow' => 'Het materiaal',
		'lead'    => 'Een mengsel van cement, harsen en minerale pigmenten, in dunne lagen met de spaan aangebracht. Elke haal laat een spoor na. Zo zijn geen twee oppervlakken hetzelfde.',
		'columns' => array(
			'Omdat de laag zo dun is, gaat microcement meestal over uw bestaande tegels of vloer. Die moeten wel vast en vlak liggen. Zo is er geen zwaar breekwerk nodig en blijft er geen puin achter. Deuren en plinten passen vaak gewoon nog.',
			'Na het afwerken sluiten wij het oppervlak af met een beschermende vernis. Die maakt het water- en vlekwerend. In de douche en rond het bad komt er eerst een waterdichting onder. Zo is microcement ook geschikt voor natte ruimtes en keukenbladen.',
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
				'text'  => 'Wanden, vloer en inloopdouche in één materiaal. Zonder voegen zetten vuil en kalk zich minder snel vast.',
				'image' => 'realisatie-badkamers.jpg',
			),
			array(
				'title' => 'Keuken',
				'text'  => 'Werkbladen, spatwanden en eilanden. Vlekwerend dankzij de afwerklaag en bestand tegen normale keukenwarmte. Hete potten zet u op een onderlegger.',
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
		'text'    => 'Wij mengen elke kleur op maat, van kalkwit tot diep grafiet. Glad of met een zichtbare spaanslag. Bij het eerste bezoek brengen wij stalen mee. Zo ziet u de kleur in het licht van uw eigen ruimte.',
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
	'text'    => 'Wij volgen uw project zelf op, van het eerste gesprek tot de laatste laag vernis.',
	'link'    => array( 'label' => 'Lees de veelgestelde vragen', 'url' => '/veelgestelde-vragen' ),
	'steps'   => array(
		array(
			'title' => 'Bezoek ter plaatse',
			'text'  => 'Wij bekijken de ondergrond, meten op en tonen stalen in uw ruimte. Waar nodig meten wij ook het vocht.',
		),
		array(
			'title' => 'Offerte met vaste prijs',
			'text'  => 'Binnen de week ontvangt u een offerte met een vaste prijs en een planning.',
		),
		array(
			'title' => 'Voorbereiding',
			'text'  => 'Wij herstellen en egaliseren de ondergrond. Een hechtlaag zorgt dat alles goed hecht. Een wapeningsnet vangt spanningen in de ondergrond op. In natte zones komt er een waterdichting onder.',
		),
		array(
			'title' => 'Aanbrengen',
			'text'  => 'Laag per laag, met de hand. Na elke laag laten wij het materiaal drogen en schuren wij het bij.',
		),
		array(
			'title' => 'Oplevering',
			'text'  => 'Een vernis beschermt het oppervlak tegen water en vlekken. Bij de oplevering leggen wij het onderhoud uit.',
		),
	),
) ); ?>

<?php get_template_part( 'partials/blocks/cta', null, array(
	'classes' => 'mt-[16rem]',
	'title'   => 'Benieuwd hoe het<br>oogt in uw ruimte?',
	'link'    => array( 'label' => 'Plan een bezoek ter plaatse', 'url' => '/contact' ),
) ); ?>

<?php get_footer(); ?>
