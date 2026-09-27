<?php
/**
 * Page content below a prototype header, taken from the real pages.
 *
 * @var array  $args
 * @var string $body  werkwijze, microcement, realisaties, faq, over-ons or badkamers
 * @var bool   $cta   Optional, false leaves out the closing call to action
 */
$body = $args['body'];
$cta  = $args['cta'] ?? true;

$faq_microcement = array(
	array( 'question' => 'Wat kost microcement?', 'answer' => 'De prijs hangt af van de oppervlakte, de staat van de ondergrond en de toepassing. Na een bezoek ter plaatse krijgt u een vaste prijs voor het hele project, zonder verrassingen achteraf.' ),
	array( 'question' => 'Kan het over mijn bestaande tegels?', 'answer' => 'Meestal wel. De tegels moeten vast liggen en vlak zijn. Wij vullen de voegen op en brengen een wapeningsnet aan, zodat de voegen later niet zichtbaar worden.' ),
	array( 'question' => 'Is het geschikt voor een inloopdouche?', 'answer' => 'Ja. Wij brengen eerst een waterdichting aan en werken af met een vernis voor natte ruimtes. Hoeken, nissen en afvoeren krijgen extra aandacht.' ),
	array( 'question' => 'Hoe onderhoud ik het?', 'answer' => 'Met lauw water en een pH-neutrale zeep. Vermijd schuurmiddelen en agressieve producten.' ),
);

$faq_praktisch = array(
	array( 'question' => 'Wat kost het eerste bezoek?', 'answer' => 'Niets. Het bezoek ter plaatse en de offerte zijn gratis en zonder verplichting.' ),
	array( 'question' => 'Kan ik thuis blijven wonen tijdens de werken?', 'answer' => 'Meestal wel. Wij spreken vooraf af welke ruimtes wanneer niet bruikbaar zijn. Dat staat in de planning.' ),
	array( 'question' => 'Hoe snel kunnen jullie starten?', 'answer' => 'Dat hangt af van onze planning en van de grootte van uw project. Bij de offerte krijgt u een concrete startdatum.' ),
	array( 'question' => 'Werken jullie samen met mijn architect?', 'answer' => 'Graag. Wij stemmen af met uw architect of interieurontwerper over details, materialen en timing.' ),
);

$faq_badkamers = array(
	array( 'question' => 'Hoe lang duurt een badkamer?', 'answer' => 'Dat hangt af van de grootte en van het sanitair. U krijgt de planning vooraf, bij de offerte.' ),
	array( 'question' => 'Kan ik zelf sanitair kiezen?', 'answer' => 'Ja. Wij adviseren u graag, maar u kiest zelf. Wij stemmen de afwerking af op wat u kiest.' ),
	array( 'question' => 'Doen jullie ook de leidingen?', 'answer' => 'Wij nemen het volledige project in handen. U heeft één aanspreekpunt, van het eerste gesprek tot de oplevering.' ),
);

$cards = array(
	array( 'label' => 'Badkamers', 'url' => '/realisaties/badkamers', 'image' => 'realisatie-badkamers.jpg', 'image_alt' => 'Badkamer in natuursteen' ),
	array( 'label' => 'Binnenafwerking', 'url' => '/realisaties/binnenafwerking', 'image' => 'realisatie-binnenafwerking.jpg', 'image_alt' => 'Slaapkamer met maatwerk kasten' ),
	array( 'label' => 'Microcement', 'url' => '/realisaties/microcement', 'image' => 'realisatie-microcement.jpg', 'image_alt' => 'Eettafel in microcement' ),
);
?>

<?php if ( $body === 'werkwijze' ) : ?>

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
			array( 'title' => 'Kennismaking', 'text' => 'U vertelt ons over uw project, telefonisch of via het formulier. Wij luisteren naar uw plannen en uw wensen.' ),
			array( 'title' => 'Bezoek ter plaatse', 'text' => 'Wij bekijken de ruimte en de ondergrond, meten op en tonen stalen. U hoort meteen wat kan en wat niet.' ),
			array( 'title' => 'Vaste offerte', 'text' => 'Binnen de week ontvangt u een duidelijke offerte, met een vaste prijs en een planning.' ),
			array( 'title' => 'Uitvoering', 'text' => 'Onze eigen ploeg voert de werken uit. Uw aanspreekpunt bewaakt de planning en het budget.' ),
			array( 'title' => 'Oplevering', 'text' => 'Samen lopen wij alles na. U krijgt uitleg over het onderhoud, en ook na de werken blijven wij bereikbaar.' ),
		),
	) ); ?>

	<?php get_template_part( 'partials/blocks/faq', null, array(
		'classes' => 'mt-[14rem]',
		'title'   => 'Praktisch',
		'text'    => 'De vragen die wij het vaakst krijgen voor de start van een project.',
		'items'   => $faq_praktisch,
	) ); ?>

	<?php if ( $cta ) get_template_part( 'partials/blocks/cta', null, array(
		'classes' => 'mt-[16rem]',
		'title'   => 'Klaar voor<br>de eerste stap?',
		'link'    => array( 'label' => 'Vraag een offerte aan', 'url' => '/contact' ),
	) ); ?>

<?php elseif ( $body === 'microcement' ) : ?>

	<div class="c-panel c-panel--left mt-[8rem]" style="--panel-inset-bottom: 0">
		<?php get_template_part( 'partials/blocks/lead', null, array(
			'classes' => 'pt-[10rem]',
			'eyebrow' => 'Het materiaal',
			'lead'    => 'Een mengsel van cement, harsen en minerale pigmenten, in dunne lagen met de spaan aangebracht. Elke haal laat een spoor na. Zo zijn geen twee oppervlakken hetzelfde.',
			'columns' => array(
				'Omdat de laag zo dun is, gaat microcement meestal rechtstreeks over uw bestaande tegels of vloer. Er is geen zwaar breekwerk nodig, geen puin en geen lange werf.',
				'Na het afwerken sluiten wij het oppervlak af met een beschermende vernis. Die maakt het waterdicht en bestand tegen vlekken.',
			),
		) ); ?>

		<?php get_template_part( 'partials/blocks/index-list', null, array(
			'classes' => 'mt-[16rem] pb-[14rem]',
			'title'   => 'Toepassingen',
			'items'   => array(
				array( 'title' => 'Vloeren', 'text' => 'Eén doorlopende vloer door de hele verdieping, zonder drempels of voegen. Geschikt voor vloerverwarming.', 'image' => 'toepassingen.jpg' ),
				array( 'title' => 'Badkamer en douche', 'text' => 'Wanden, vloer en inloopdouche in één materiaal. Zonder voegen is er geen plek waar vuil of kalk zich vastzet.', 'image' => 'realisatie-badkamers.jpg' ),
				array( 'title' => 'Keuken', 'text' => 'Werkbladen, spatwanden en eilanden. Hittebestendig en vlekwerend dankzij de afwerklaag.', 'image' => 'hero.jpg' ),
				array( 'title' => 'Meubels en maatwerk', 'text' => 'Tafels, banken, wastafels en kasten. Wij werken ook bestaande meubels opnieuw af.', 'image' => 'realisatie-microcement.jpg' ),
			),
		) ); ?>
	</div>

	<?php get_template_part( 'partials/blocks/faq', null, array(
		'classes' => 'mt-[14rem]',
		'title'   => 'Vragen over<br>microcement',
		'items'   => $faq_microcement,
	) ); ?>

	<?php if ( $cta ) get_template_part( 'partials/blocks/cta', null, array(
		'classes' => 'mt-[16rem]',
		'title'   => 'Benieuwd wat het<br>in uw ruimte geeft?',
		'link'    => array( 'label' => 'Plan een bezoek ter plaatse', 'url' => '/contact' ),
	) ); ?>

<?php elseif ( $body === 'realisaties' ) : ?>

	<?php get_template_part( 'partials/blocks/wall', null, array(
		'classes' => 'mt-[8rem]',
		'tiles'   => array(
			array( 'image' => 'hero.jpg', 'ratio' => '4/5', 'alt' => 'Keuken met microcement afwerking', 'caption' => 'Keuken · Gent' ),
			array( 'image' => 'toepassingen.jpg', 'ratio' => '4/3', 'alt' => 'Detail van een afgewerkt meubel' ),
			array( 'image' => 'realisatie-badkamers.jpg', 'ratio' => '2/3', 'alt' => 'Badkamer in natuursteen', 'caption' => 'Badkamer · Latem' ),
			array( 'image' => 'detail-groot.jpg', 'ratio' => '3/4', 'alt' => 'Badkamer in travertin' ),
			array( 'image' => 'realisatie-microcement.jpg', 'ratio' => '1/1', 'alt' => 'Eettafel in microcement', 'caption' => 'Tafel · Deinze' ),
			array( 'image' => 'detail-groot.jpg', 'ratio' => '4/5', 'alt' => 'Badkamer in travertin', 'caption' => 'Badkamer · Gavere', 'feature' => true ),
			array( 'image' => 'realisatie-binnenafwerking.jpg', 'ratio' => '4/5', 'alt' => 'Slaapkamer met maatwerk kasten', 'caption' => 'Slaapkamer · Gent' ),
			array( 'image' => 'hero.jpg', 'ratio' => '3/2', 'alt' => 'Keuken met microcement afwerking' ),
			array( 'image' => 'detail-zwembad.jpg', 'ratio' => '2/3', 'alt' => 'Binnenzwembad met betonnen balken', 'caption' => 'Zwembad · Oudenaarde' ),
		),
	) ); ?>

	<?php if ( $cta ) get_template_part( 'partials/blocks/cta', null, array(
		'classes' => 'mt-[14rem]',
		'title'   => 'Ook zo\'n resultaat<br>in uw woning?',
		'link'    => array( 'label' => 'Vraag een offerte', 'url' => '/contact' ),
	) ); ?>

<?php elseif ( $body === 'faq' ) : ?>

	<div id="microcement" class="scroll-mt-[4rem]">
		<?php get_template_part( 'partials/blocks/faq', null, array(
			'classes' => 'mt-[11rem]',
			'title'   => 'Microcement',
			'items'   => $faq_microcement,
		) ); ?>
	</div>

	<div id="badkamers" class="scroll-mt-[4rem]">
		<?php get_template_part( 'partials/blocks/faq', null, array(
			'classes' => 'mt-[12rem]',
			'title'   => 'Badkamers',
			'items'   => $faq_badkamers,
		) ); ?>
	</div>

	<div id="praktisch" class="scroll-mt-[4rem]">
		<?php get_template_part( 'partials/blocks/faq', null, array(
			'classes' => 'mt-[12rem]',
			'title'   => 'Praktisch',
			'items'   => $faq_praktisch,
		) ); ?>
	</div>

	<?php if ( $cta ) get_template_part( 'partials/blocks/cta', null, array(
		'classes' => 'mt-[16rem]',
		'title'   => 'Staat uw vraag<br>er niet bij?',
		'link'    => array( 'label' => 'Stel ze ons', 'url' => '/contact' ),
	) ); ?>

<?php elseif ( $body === 'over-ons' ) : ?>

	<div class="c-panel mt-[9rem]" style="--panel-inset-bottom: 0">
		<?php get_template_part( 'partials/blocks/lead', null, array(
			'classes' => 'pt-[10rem]',
			'eyebrow' => 'Ons verhaal',
			'lead'    => 'Een ruimte krijgt haar karakter in de laatste laag. Daarom doen wij de afwerking zelf, met een eigen ploeg.',
			'columns' => array(
				'Wij besteden niets uit. De mensen die uw project voorbereiden, voeren het ook uit. Zo kennen zij elk detail, en blijft de kwaliteit gelijk van begin tot einde.',
				'Wij werken voor particulieren, architecten en interieurontwerpers. Liever minder projecten met volle aandacht, dan veel projecten tegelijk.',
			),
		) ); ?>

		<?php get_template_part( 'partials/blocks/index-list', null, array(
			'classes' => 'mt-[16rem]',
			'title'   => 'Voor wie wij werken',
			'items'   => array(
				array( 'title' => 'Particulieren', 'text' => 'U renoveert of bouwt en wilt één partij voor de afwerking. Wij denken mee over materiaal en kleur.', 'image' => 'realisatie-badkamers.jpg' ),
				array( 'title' => 'Architecten', 'text' => 'U tekent het ontwerp, wij voeren het uit tot in het detail. Wij overleggen bij elke keuze op de werf.', 'image' => 'detail-groot.jpg' ),
				array( 'title' => 'Interieurontwerpers', 'text' => 'U zoekt een partner voor maatwerk en bijzondere afwerkingen. Wij maken stalen op maat.', 'image' => 'realisatie-microcement.jpg' ),
			),
		) ); ?>

		<?php get_template_part( 'partials/blocks/realisaties', null, array(
			'classes' => 'mt-[16rem] pb-[14rem]',
			'title'   => 'Ons werk',
			'link'    => array( 'label' => 'Ontdek al onze realisaties', 'url' => '/realisaties' ),
			'cards'   => $cards,
		) ); ?>
	</div>

	<?php if ( $cta ) get_template_part( 'partials/blocks/cta', null, array(
		'classes' => 'mt-[16rem]',
		'title'   => 'Zullen wij<br>kennismaken?',
		'link'    => array( 'label' => 'Neem contact op', 'url' => '/contact' ),
	) ); ?>

<?php elseif ( $body === 'badkamers' ) : ?>

	<?php get_template_part( 'partials/blocks/index-list', null, array(
		'classes' => 'mt-[14rem]',
		'title'   => 'Wat wij doen',
		'items'   => array(
			array( 'title' => 'Volledige renovatie', 'text' => 'Van afbraak tot oplevering. Wij coördineren alle vakmensen, u heeft één aanspreekpunt.', 'image' => 'detail-groot.jpg' ),
			array( 'title' => 'Inloopdouche', 'text' => 'Naadloos in microcement of natuursteen, met een waterdichting die wij zelf aanbrengen.', 'image' => 'realisatie-badkamers.jpg' ),
			array( 'title' => 'Badmeubels op maat', 'text' => 'Wastafels, nissen en kasten, afgewerkt in hetzelfde materiaal als de wanden.', 'image' => 'realisatie-microcement.jpg' ),
		),
	) ); ?>

	<?php get_template_part( 'partials/blocks/realisaties', null, array(
		'classes' => 'mt-[16rem]',
		'title'   => 'Recente badkamers',
		'link'    => array( 'label' => 'Ontdek al onze realisaties', 'url' => '/realisaties' ),
		'cards'   => $cards,
	) ); ?>

	<?php get_template_part( 'partials/blocks/faq', null, array(
		'classes' => 'mt-[14rem]',
		'title'   => 'Vragen over<br>badkamers',
		'items'   => $faq_badkamers,
	) ); ?>

	<?php if ( $cta ) get_template_part( 'partials/blocks/cta', null, array(
		'classes' => 'mt-[16rem]',
		'title'   => 'Uw badkamer,<br>van plan tot oplevering',
		'link'    => array( 'label' => 'Plan een bezoek ter plaatse', 'url' => '/contact' ),
	) ); ?>

<?php endif; ?>
