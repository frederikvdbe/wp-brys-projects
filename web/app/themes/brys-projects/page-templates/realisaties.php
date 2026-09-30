<?php
/**
 * Template name: Realisaties
 * @var WP_Post $post
 */
get_header();

$tiles = array(
	array( 'image' => 'keuken-open-rekken.jpg', 'ratio' => '4/5', 'alt' => 'Keuken met open rekken en zwarte tegels', 'caption' => 'Keuken' ),
	array( 'image' => 'badkamer-dubbele-wastafel.jpg', 'ratio' => '4/3', 'alt' => 'Badkamer met twee stenen waskommen' ),
	array( 'image' => 'trap-microcement.jpg', 'ratio' => '2/3', 'alt' => 'Trap in microcement', 'caption' => 'Trap' ),
	array( 'image' => 'wastafel-natuursteen.jpg', 'ratio' => '3/4', 'alt' => 'Stenen waskom op een houten blad' ),
	array( 'image' => 'bad-bovenaanzicht.jpg', 'ratio' => '1/1', 'alt' => 'Vrijstaand bad van bovenaf', 'caption' => 'Badkamer' ),
	array( 'image' => 'eetkamer-tafel.jpg', 'ratio' => '4/5', 'alt' => 'Eetkamer met houten tafel en travertin vloer', 'caption' => 'Eetkamer', 'feature' => true ),
	array( 'image' => 'douche-messing.jpg', 'ratio' => '4/5', 'alt' => 'Douche met messing kraan', 'caption' => 'Douche' ),
	array( 'image' => 'nis-microcement.jpg', 'ratio' => '3/2', 'alt' => 'Nissen in een wand van microcement' ),
	array( 'image' => 'woning-buitenzijde.jpg', 'ratio' => '2/3', 'alt' => 'Buitenzijde van een gerenoveerde woning', 'caption' => 'Woning' ),
	array( 'image' => 'inkom-kruiken.jpg', 'ratio' => '4/5', 'alt' => 'Inkom met stenen kruiken' ),
	array( 'image' => 'wand-microcement-rond.jpg', 'ratio' => '1/1', 'alt' => 'Afgeronde wand in microcement', 'caption' => 'Wand' ),
	array( 'image' => 'badkamer-bad-travertin.jpg', 'ratio' => '3/4', 'alt' => 'Vrijstaand bad op een travertin vloer' ),
	array( 'image' => 'douche-microcement.jpg', 'ratio' => '2/3', 'alt' => 'Inloopdouche in microcement', 'caption' => 'Douche' ),
	array( 'image' => 'inkom-trap.jpg', 'ratio' => '4/3', 'alt' => 'Inkom met trap en kapstok' ),
	array( 'image' => 'badkamer-open-trap.jpg', 'ratio' => '4/5', 'alt' => 'Badkamer in microcement met open trap', 'caption' => 'Badkamer', 'feature' => true ),
	array( 'image' => 'wastafel-spiegel.jpg', 'ratio' => '1/1', 'alt' => 'Badkamer met stenen waskom en spiegel' ),
);
?>

<?php get_template_part( 'partials/blocks/page-intro', null, array(
	'classes' => 'b-page-intro--narrow',
	'title'   => 'Elke ruimte,<br>haar eigen karakter',
) ); ?>

<?php get_template_part( 'partials/blocks/wall', null, array(
	'classes' => 'mt-[5rem]',
	'intro'   => 'Een greep uit ons werk. Badkamers, vloeren, keukens en meubels, met de hand afgewerkt in microcement en natuurlijke materialen.',
	'tiles'   => $tiles,
) ); ?>

<?php get_template_part( 'partials/blocks/cta', null, array(
	'classes' => 'mt-[14rem]',
	'title'   => 'Ook zo\'n afwerking<br>in uw woning?',
	'link'    => array( 'label' => 'Vraag een offerte aan', 'url' => '/contact#offerte' ),
) ); ?>

<?php get_footer(); ?>
