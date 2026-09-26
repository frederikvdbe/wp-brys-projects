<?php
/**
 * Template name: Realisaties
 * @var WP_Post $post
 */
get_header();

$tiles = array(
	array( 'image' => 'hero.jpg', 'ratio' => '4/5', 'alt' => 'Keuken met microcement afwerking', 'caption' => 'Keuken · Gent' ),
	array( 'image' => 'toepassingen.jpg', 'ratio' => '4/3', 'alt' => 'Detail van een afgewerkt meubel' ),
	array( 'image' => 'realisatie-badkamers.jpg', 'ratio' => '2/3', 'alt' => 'Badkamer in natuursteen', 'caption' => 'Badkamer · Latem' ),
	array( 'image' => 'detail-groot.jpg', 'ratio' => '3/4', 'alt' => 'Badkamer in travertin' ),
	array( 'image' => 'realisatie-microcement.jpg', 'ratio' => '1/1', 'alt' => 'Eettafel in microcement', 'caption' => 'Tafel · Deinze' ),
	array( 'image' => 'detail-groot.jpg', 'ratio' => '4/5', 'alt' => 'Badkamer in travertin', 'caption' => 'Badkamer · Gavere', 'feature' => true ),
	array( 'image' => 'realisatie-binnenafwerking.jpg', 'ratio' => '4/5', 'alt' => 'Slaapkamer met maatwerk kasten', 'caption' => 'Slaapkamer · Gent' ),
	array( 'image' => 'hero.jpg', 'ratio' => '3/2', 'alt' => 'Keuken met microcement afwerking' ),
	array( 'image' => 'detail-groot.jpg', 'ratio' => '5/7', 'alt' => 'Badkamer in travertin', 'caption' => 'Badkamer · Merelbeke' ),
	array( 'image' => 'realisatie-microcement.jpg', 'ratio' => '4/5', 'alt' => 'Eettafel in microcement' ),
	array( 'image' => 'toepassingen.jpg', 'ratio' => '1/1', 'alt' => 'Detail van een afgewerkt meubel', 'caption' => 'Detail' ),
	array( 'image' => 'realisatie-badkamers.jpg', 'ratio' => '3/4', 'alt' => 'Badkamer in natuursteen' ),
	array( 'image' => 'detail-zwembad.jpg', 'ratio' => '2/3', 'alt' => 'Binnenzwembad met betonnen balken', 'caption' => 'Zwembad · Oudenaarde' ),
	array( 'image' => 'realisatie-binnenafwerking.jpg', 'ratio' => '4/3', 'alt' => 'Slaapkamer met maatwerk kasten' ),
	array( 'image' => 'hero.jpg', 'ratio' => '4/5', 'alt' => 'Keuken met microcement afwerking', 'caption' => 'Keuken · Sint-Martens-Latem', 'feature' => true ),
	array( 'image' => 'detail-groot.jpg', 'ratio' => '1/1', 'alt' => 'Badkamer in travertin' ),
);
?>

<?php get_template_part( 'partials/blocks/page-intro', null, array(
	'eyebrow' => 'Realisaties',
	'count'   => count( $tiles ),
	'title'   => 'Elke ruimte,<br>één laag karakter',
	'text'    => 'Een greep uit ons werk. Badkamers, vloeren, keukens en meubels, met de hand afgewerkt in microcement en natuurlijke materialen.',
) ); ?>

<?php get_template_part( 'partials/blocks/wall', null, array(
	'classes' => 'mt-[9rem]',
	'tiles'   => $tiles,
) ); ?>

<?php get_template_part( 'partials/blocks/cta', null, array(
	'classes' => 'mt-[14rem]',
	'title'   => 'Ook zo\'n resultaat<br>in uw woning?',
	'link'    => array( 'label' => 'Vraag een offerte', 'url' => '/contact' ),
) ); ?>

<?php get_footer(); ?>
