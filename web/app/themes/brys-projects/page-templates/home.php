<?php
/**
 * Template name: Home
 * @var WP_Post $post
 */
get_header();
?>

<?php get_template_part( 'partials/blocks/hero', null, array(
	'title'     => 'Meesterschap<br>in afwerking',
	'text'      => 'Het evenwicht tussen ruwe kracht en verfijnd detail. Wij werken vanuit vakmanschap en met oog voor ontwerp. Zo worden muren, vloeren en meubels één geheel met karakter.',
	'link'      => array( 'label' => 'Ontdek onze realisaties', 'url' => '/realisaties' ),
	'image'     => 'keuken-open-rekken.jpg',
	'image_alt' => 'Keuken met open rekken en zwarte tegels',
) ); ?>

<?php // Lighter panel that runs from the scroll hint down to halfway the detail block ?>
<div class="c-panel">

	<div class="o-container">
		<p class="c-eyebrow pt-[2.75rem] pl-[0.9375rem] flex items-center gap-[0.5625rem]" data-scroll-hint=".b-realisaties h2">
			Scroll
			<span class="c-scroll-arrow">
				<?php get_template_part( 'partials/vectors/arrow-diagonal.svg', null, array( 'size' => 9 ) ); ?>
			</span>
		</p>
	</div>

	<?php get_template_part( 'partials/blocks/realisaties', null, array(
		'classes' => 'mt-[max(14.8125rem,calc(var(--hero-overhang)+4.75rem))]',
		'title'   => 'Onze diensten',
		'link'    => array( 'label' => 'Ontdek al onze realisaties', 'url' => '/realisaties' ),
		'cards'   => array(
			array(
				'label'     => 'Badkamers',
				'url'       => '/realisaties/badkamers',
				'image'     => 'wastafel-spiegel.jpg',
				'image_alt' => 'Badkamer met stenen waskom op een houten blad',
			),
			array(
				'label'     => 'Binnenafwerking',
				'url'       => '/realisaties/binnenafwerking',
				'image'     => 'eetkamer-tafel.jpg',
				'image_alt' => 'Eetkamer met houten tafel en travertin vloer',
			),
			array(
				'label'     => 'Microcement',
				'url'       => '/realisaties/microcement',
				'image'     => 'douche-microcement.jpg',
				'image_alt' => 'Inloopdouche in microcement',
			),
		),
	) ); ?>

	<?php get_template_part( 'partials/blocks/statement', null, array(
		'classes'   => 'mt-[19.75rem]',
		'statement' => 'Een ruimte krijgt haar karakter<br>in de laatste laag.',
		'pillars'   => array(
			array(
				'number' => '01',
				'title'  => 'Vakmanschap',
				'text'   => 'Wij werken met een eigen ploeg, zonder onderaannemers. Dezelfde mensen staan van de eerste tot de laatste dag op uw werf. Elke laag wordt met de hand aangebracht door vakmensen die het materiaal kennen.',
			),
			array(
				'number' => '02',
				'title'  => 'Materiaal',
				'text'   => 'Microcement, beton, hout of steen: wij kiezen wat bij de ruimte past. Microcement gaat meestal over uw bestaande vloer of tegels, zonder zwaar breekwerk. Slijtvast, water- en vlekwerend, en gemaakt voor dagelijks gebruik.',
			),
			array(
				'number' => '03',
				'title'  => 'Zekerheid',
				'text'   => 'Eén aanspreekpunt, van het eerste gesprek tot de oplevering. Wij bewaken planning en budget. U hoeft niets te coördineren.',
			),
		),
	) ); ?>

	<?php get_template_part( 'partials/blocks/detail', null, array(
		'classes'     => 'mt-[13.25rem]',
		'image_large' => array( 'file' => 'badkamer-dubbele-wastafel.jpg', 'alt' => 'Badkamer met twee stenen waskommen' ),
		'image_small' => array( 'file' => 'bad-bovenaanzicht.jpg', 'alt' => 'Vrijstaand bad van bovenaf' ),
		'text'        => 'Een bijzonder pand verdient een afwerking die klopt. Wij nemen u de werken volledig uit handen, tegen een vaste prijs. U kiest, wij voeren uit.',
		'link'        => array( 'label' => 'Bekijk onze werkwijze', 'url' => '/werkwijze' ),
	) ); ?>

</div>

<?php get_template_part( 'partials/blocks/toepassingen', null, array(
	'classes'   => 'mt-[12.8125rem]',
	'title'     => 'Eén materiaal,<br>elke vorm',
	'text'      => 'Van inloopdouche tot keukeneiland, van trap tot tafel. Microcement volgt elke lijn van de ruimte, zonder voeg of drempel.',
	'link'      => array( 'label' => 'Ontdek microcement', 'url' => '/microcement' ),
	'image'     => 'vloer-travertin-detail.jpg',
	'image_alt' => 'Vloer in smalle tegels die overgaat in travertin, naast een afgeronde wand',
	'image_position' => 'object-top',
) ); ?>

<?php get_footer(); ?>
