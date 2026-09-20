<?php
/**
 * Template name: Home
 * @var WP_Post $post
 */
get_header();
?>

<?php get_template_part( 'partials/blocks/hero', null, array(
	'title'     => 'Meesterschap<br>in afwerking',
	'text'      => 'Het perfecte evenwicht tussen ruwe kracht en verfijnde finesse. Vanuit vakmanschap en met oog voor ontwerp maakt Brys Projects van muren, vloeren en meubels één naadloos geheel met karakter.',
	'link'      => array( 'label' => 'Ontdek onze realisaties', 'url' => '/realisaties' ),
	'image'     => 'hero.jpg',
	'image_alt' => 'Keuken met microcement afwerking',
) ); ?>

<?php // Lighter panel that runs from the scroll hint down to halfway the detail block ?>
<div class="c-panel">

	<div class="o-container">
		<p class="c-eyebrow pt-[2.75rem] pl-[0.9375rem] flex items-center gap-[0.5625rem]">
			Scroll
			<?php get_template_part( 'partials/vectors/arrow-diagonal.svg', null, array( 'size' => 9 ) ); ?>
		</p>
	</div>

	<?php get_template_part( 'partials/blocks/realisaties', null, array(
		'classes' => 'mt-[14.8125rem]',
		'title'   => 'Onze realisaties',
		'link'    => array( 'label' => 'Ontdek al onze realisaties', 'url' => '/realisaties' ),
		'cards'   => array(
			array(
				'label'     => 'Badkamers',
				'url'       => '/realisaties/badkamers',
				'image'     => 'realisatie-badkamers.jpg',
				'image_alt' => 'Badkamer in natuursteen',
			),
			array(
				'label'     => 'Binnenafwerking',
				'url'       => '/realisaties/binnenafwerking',
				'image'     => 'realisatie-binnenafwerking.jpg',
				'image_alt' => 'Slaapkamer met maatwerk kasten',
			),
			array(
				'label'     => 'Microcement',
				'url'       => '/realisaties/microcement',
				'image'     => 'realisatie-microcement.jpg',
				'image_alt' => 'Eettafel in microcement',
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
				'text'   => 'Wij werken met een eigen ploeg, geen onderaannemers. Dezelfde mensen staan van de eerste tot de laatste dag op uw werf. Elke laag wordt met de hand aangebracht, door vakmensen die het materiaal kennen.',
			),
			array(
				'number' => '02',
				'title'  => 'Materiaal',
				'text'   => 'Microcement, beton, hout of steen: wij kiezen wat bij de ruimte past. Microcement gaat meestal over uw bestaande vloer of tegels, dus zonder zwaar breekwerk. Slijtvast, waterdicht en gemaakt voor dagelijks gebruik.',
			),
			array(
				'number' => '03',
				'title'  => 'Zekerheid',
				'text'   => 'Eén aanspreekpunt, van het eerste gesprek tot de oplevering. Wij nemen het volledige project in handen en bewaken planning en budget. U hoeft niets te coördineren.',
			),
		),
	) ); ?>

	<?php get_template_part( 'partials/blocks/detail', null, array(
		'classes'     => 'mt-[13.25rem]',
		'image_large' => array( 'file' => 'detail-groot.jpg', 'alt' => 'Badkamer in travertin' ),
		'image_small' => array( 'file' => 'detail-zwembad.jpg', 'alt' => 'Binnenzwembad met betonnen balken' ),
		'text'        => 'Wilt u graag in een bijzonder pand wonen, maar ziet u op tegen het renovatieproces en alles wat daarbij komt kijken? De financiële stress, het vele werk en de ontelbare keuzes? Hier bent u aan het juiste adres.',
		'link'        => array( 'label' => 'Ontdek onze realisaties', 'url' => '/realisaties' ),
	) ); ?>

</div>

<?php get_template_part( 'partials/blocks/toepassingen', null, array(
	'classes'   => 'mt-[12.8125rem]',
	'title'     => 'Refined by strength',
	'text'      => 'Wilt u graag in een bijzonder pand wonen, maar ziet u op tegen het renovatieproces en alles wat daarbij komt kijken? De financiële stress, het vele werk en de ontelbare keuzes? Hier bent u aan het juiste adres.',
	'link'      => array( 'label' => 'Ontdek onze toepassingen', 'url' => '/toepassingen' ),
	'image'     => 'toepassingen.jpg',
	'image_alt' => 'Detail van een afgewerkt meubel',
) ); ?>

<?php get_footer(); ?>
