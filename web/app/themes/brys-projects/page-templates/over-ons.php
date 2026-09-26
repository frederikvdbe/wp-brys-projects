<?php
/**
 * Template name: Over ons
 * @var WP_Post $post
 */
get_header();
?>

<?php get_template_part( 'partials/blocks/page-intro', null, array(
	'title' => 'Wie<br>wij zijn',
	'text'  => 'Brys Projects is een afwerkingsbedrijf uit Sint-Denijs-Westrem. Wij werken aan binnenhuisafwerking, badkamers en microcement.',
) ); ?>

<?php get_template_part( 'partials/blocks/figure', null, array(
	'classes'   => 'mt-[9rem]',
	'image'     => 'hero.jpg',
	'image_alt' => 'Keuken met microcement afwerking',
	'align'     => 'left',
) ); ?>

<?php get_template_part( 'partials/blocks/lead', null, array(
	'classes' => 'mt-[14rem]',
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
		array(
			'title' => 'Particulieren',
			'text'  => 'U renoveert of bouwt en wilt één partij voor de afwerking. Wij denken mee over materiaal en kleur, en nemen het werk volledig uit handen.',
			'image' => 'realisatie-badkamers.jpg',
		),
		array(
			'title' => 'Architecten',
			'text'  => 'U tekent het ontwerp, wij voeren het uit tot in het detail. Wij volgen uw plannen en overleggen bij elke keuze op de werf.',
			'image' => 'detail-groot.jpg',
		),
		array(
			'title' => 'Interieurontwerpers',
			'text'  => 'U zoekt een partner voor maatwerk en bijzondere afwerkingen. Wij maken stalen op maat, zodat u kleur en textuur kunt tonen aan uw klant.',
			'image' => 'realisatie-microcement.jpg',
		),
	),
) ); ?>

<?php get_template_part( 'partials/blocks/realisaties', null, array(
	'classes' => 'mt-[16rem]',
	'title'   => 'Ons werk',
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

<?php get_template_part( 'partials/blocks/cta', null, array(
	'classes' => 'mt-[16rem]',
	'title'   => 'Zullen wij<br>kennismaken?',
	'link'    => array( 'label' => 'Neem contact op', 'url' => '/contact' ),
) ); ?>

<?php get_footer(); ?>
