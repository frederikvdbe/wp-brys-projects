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

<?php get_template_part( 'partials/blocks/cta', null, array(
	'classes' => 'mt-[16rem]',
	'title'   => 'Zullen wij<br>kennismaken?',
	'link'    => array( 'label' => 'Neem contact op', 'url' => '/contact' ),
) ); ?>

<?php get_footer(); ?>
