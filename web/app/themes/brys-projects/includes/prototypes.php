<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
	die ( 'You do not have sufficient permissions to access this page' );
}

// Static pages with page header prototypes: an overview at /hero-prototypes and one
// page per prototype at /hero-prototypes/<slug>. Matched on the path, so no rewrite
// flush is needed.
function brys_prototypes() {
	return array(
		'page-intro' => array(
			'status' => 'Aangepast',
			'name'   => 'Page intro',
			'text'   => 'Titel links, korte tekst rechts. Minder witruimte: de tekst sluit aan bij de titel, het beeld volgt sneller.',
			'body'   => 'werkwijze',
		),
		'showcase' => array(
			'status' => 'Aangepast',
			'name'   => 'Showcase',
			'text'   => 'Grote titel, daaronder een beeld tot de linkerrand. De tekst staat nu bovenaan naast het beeld, niet meer los onderaan.',
			'body'   => 'microcement',
		),
		'kantlijn' => array(
			'status' => 'Nieuw',
			'name'   => 'Kantlijn',
			'text'   => 'Zeer grote titel, daaronder één openingszin. Verder niets.',
			'body'   => 'badkamers',
		),
	);
}

// Call to action prototypes: all of them on /cta-prototypes, one at the end of a
// real page on /cta-prototypes/<slug>
function brys_cta_prototypes() {
	return array(
		'centered' => array(
			'status' => 'Bestaand',
			'name'   => 'Gecentreerd',
			'text'   => 'Titel en één link in het midden. Rustig, maar valt weinig op.',
		),
		'olijfblok' => array(
			'status' => 'Nieuw',
			'name'   => 'Olijfblok',
			'text'   => 'Een groen vlak binnen het raster. Grote titel, een knop en meteen de contactgegevens.',
		),
		'regel' => array(
			'status' => 'Nieuw',
			'name'   => 'Grote regel',
			'text'   => 'De hele regel is de link. Bij hover schuift het groen erachter in.',
		),
		'keuze' => array(
			'status' => 'Nieuw',
			'name'   => 'Twee keuzes',
			'text'   => 'Een vraag of een offerte. Het groene vlak is de hoofdactie, het andere de lichte.',
		),
		'zwevend' => array(
			'status' => 'Nieuw',
			'name'   => 'Zwevende knop',
			'text'   => 'Een kleine groene knop die rechtsonder verschijnt na het scrollen, op elke pagina. Samen met een korte slotregel.',
		),
	);
}

// Footer prototypes: all of them on /footer-prototypes, one under a real page on
// /footer-prototypes/<slug>. The site footer is left out on these routes.
function brys_footer_prototypes() {
	return array(
		'huidig' => array(
			'status' => 'Bestaand',
			'name'   => 'Huidig',
			'text'   => 'Logo en adres, twee kolommen met links, een regel met de wettelijke links.',
		),
		'woordmerk' => array(
			'status' => 'Nieuw',
			'name'   => 'Woordmerk',
			'text'   => 'Logo, korte zin en e-mail links. Rechts de links en het adres, onderaan de wettelijke regel.',
		),
		'woordmerk-logo' => array(
			'status' => 'Nieuw',
			'name'   => 'Woordmerk met logo',
			'text'   => 'Logo met het adres ernaast. Rechts de diensten en de pagina\'s, onderaan de wettelijke regel.',
		),
		'olijf' => array(
			'status' => 'Nieuw',
			'name'   => 'Olijf',
			'text'   => 'Een bruin vlak. Het e-mailadres is het grootste element en meteen een link.',
		),
		'beeld' => array(
			'status' => 'Nieuw',
			'name'   => 'Beeld',
			'text'   => 'Een beeld links in het raster dat boven de footer uitsteekt. Rechts het logo, het adres en de links.',
		),
	);
}

// Navigation prototypes: how the header behaves on scroll. An overview at
// /nav-prototypes, one real page per option at /nav-prototypes/<slug>.
function brys_nav_prototypes() {
	return array(
		'menuknop' => array(
			'status' => 'Nieuw',
			'name'   => 'Menuknop',
			'text'   => 'De header scrolt mee weg. Alleen een kleine knop "Menu" blijft rechtsboven staan.',
		),
		'pil' => array(
			'status' => 'Nieuw',
			'name'   => 'Compacte pil',
			'text'   => 'Bij het scrollen krimpt de header tot een kleine balk in het midden, met het logo en het menu.',
		),
		'terugkeer' => array(
			'status' => 'Nieuw',
			'name'   => 'Verbergen en terugkeren',
			'text'   => 'De header verdwijnt als je naar beneden scrolt en komt terug zodra je naar boven scrolt.',
		),
	);
}

// Toepassingen prototypes: every layout on /toepassingen-prototypes, one per page
// on /toepassingen-prototypes/<slug>. None of them need a mouse.
function brys_toepassingen_prototypes() {
	return array(
		'huidig' => array(
			'status' => 'Bestaand',
			'name'   => 'Huidig',
			'text'   => 'Lijst met grote titels. De foto volgt de muis, dus op gsm is er geen beeld.',
		),
		'lijst-beeld' => array(
			'status' => 'Nieuw',
			'name'   => 'Lijst met beeld',
			'text'   => 'Dezelfde lijst, maar elke rij heeft een kleine foto die altijd zichtbaar is.',
		),
		'raster' => array(
			'status' => 'Nieuw',
			'name'   => 'Raster',
			'text'   => 'Zes kaarten in drie kolommen: foto, nummer, titel en tekst. Op gsm onder elkaar.',
		),
		'afwisselend' => array(
			'status' => 'Nieuw',
			'name'   => 'Afwisselend',
			'text'   => 'Eén toepassing per rij. De foto staat om beurten links en rechts, de tekst ernaast.',
		),
		'strook' => array(
			'status' => 'Nieuw',
			'name'   => 'Strook',
			'text'   => 'Een rij kaarten die je opzij veegt. Op gsm met de duim, op desktop met pijlen.',
		),
		'uitklap' => array(
			'status' => 'Nieuw',
			'name'   => 'Uitklap',
			'text'   => 'Een korte lijst met titels. Tik op een titel om de foto en de tekst te zien.',
		),
	);
}

// Shared content for the toepassingen prototypes, the same as on the microcement page
function brys_toepassingen_proto_data() {
	return array(
		'title' => 'Toepassingen',
		'items' => array(
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
	);
}

// Shared content for the footer prototypes
function brys_footer_proto_data() {
	return array(
		'address'  => array( 'Louis Delebecquelaan 34', '9051 Sint-Denijs-Westrem' ),
		'email'    => 'sales@brys-projects.be',
		'phone'    => '+32 9 000 00 00',
		'tel'      => '+3290000000',
		'diensten' => array(
			array( 'label' => 'Binnenafwerking', 'url' => '/diensten/binnenafwerking' ),
			array( 'label' => 'Badkamers', 'url' => '/diensten/badkamers' ),
			array( 'label' => 'Microcement', 'url' => '/diensten/microcement' ),
		),
		'pages'    => array(
			array( 'label' => 'Realisaties', 'url' => '/realisaties' ),
			array( 'label' => 'Werkwijze', 'url' => '/werkwijze' ),
			array( 'label' => 'Over ons', 'url' => '/over-ons' ),
			array( 'label' => 'Contact', 'url' => '/contact' ),
		),
		'legal'    => array(
			array( 'label' => 'Privacy', 'url' => '/privacy-policy' ),
			array( 'label' => 'Cookies', 'url' => '/cookie-policy' ),
			array( 'label' => 'Disclaimer', 'url' => '/disclaimer' ),
		),
		'credits'  => array( 'label' => 'Website by frederikvd.be', 'url' => 'https://frederikvd.be' ),
		'year'     => date( 'Y' ),
	);
}

add_action( 'template_redirect', function () {
	$path = trim( parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ), '/' );

	if ( $path === 'prototypes' ) {
		global $wp_query;
		$wp_query->is_404 = false;
		status_header( 200 );

		add_filter( 'wp_title', fn() => 'Prototypes | ' );
		add_filter( 'body_class', fn( $classes ) => array_merge( $classes, array( 'tpl-hero-prototypes', 'tpl-prototypes' ) ), 30 );
		add_action( 'wp_head', fn() => print '<meta name="robots" content="noindex, nofollow">' . "\n" );

		include get_template_directory() . '/page-templates/prototypes.php';
		exit;
	}

	if ( ! preg_match( '#^(hero|cta|footer|nav|toepassingen)-prototypes(?:/([a-z-]+))?$#', $path, $match ) ) return;

	$type   = $match[1];
	$slug   = $match[2] ?? '';
	$protos = array( 'hero' => 'brys_prototypes', 'cta' => 'brys_cta_prototypes', 'footer' => 'brys_footer_prototypes', 'nav' => 'brys_nav_prototypes', 'toepassingen' => 'brys_toepassingen_prototypes' )[ $type ]();
	$label  = ( $type === 'cta' ? 'CTA' : ucfirst( $type ) ) . ' prototypes';

	if ( $slug && ! isset( $protos[ $slug ] ) ) return;

	global $wp_query;
	$wp_query->is_404 = false;
	status_header( 200 );

	$title = $slug ? $protos[ $slug ]['name'] . ' | ' . $label . ' | ' : $label . ' | ';

	add_filter( 'wp_title', fn() => $title );
	add_filter( 'body_class', fn( $classes ) => array_merge( $classes, array( 'tpl-hero-prototypes', 'tpl-' . $type . '-prototypes' ), $type === 'nav' && $slug ? array( 'nav-proto-' . $slug ) : array() ), 30 );
	add_action( 'wp_head', fn() => print '<meta name="robots" content="noindex, nofollow">' . "\n" );

	set_query_var( 'proto_slug', $slug );
	if ( $type === 'footer' ) set_query_var( 'hide_site_footer', true );
	include get_template_directory() . '/page-templates/' . $type . '-prototypes.php';
	exit;
} );
