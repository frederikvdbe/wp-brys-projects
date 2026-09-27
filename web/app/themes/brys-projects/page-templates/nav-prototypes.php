<?php
/**
 * Navigation prototypes, served by includes/prototypes.php.
 * Without a slug: a list of the options. With a slug: a real page with that header
 * behaviour, set through the nav-proto-<slug> body class.
 */
$protos = brys_nav_prototypes();
$slug   = get_query_var( 'proto_slug' );
$keys   = array_keys( $protos );

get_header();
?>

<?php if ( ! $slug ) : ?>

	<section class="b-proto-overview o-container">
		<p class="b-proto-caption opacity-70" data-reveal="fade">Prototypes &mdash; <a class="underline" href="/prototypes">naar alle prototypes</a></p>
		<h1 class="b-proto-overview__title" data-reveal="lines">Navigatie prototypes</h1>
		<p class="b-proto-overview__intro" data-reveal="fade">Hoe de header zich gedraagt bij het scrollen. Open een optie en scrol op de pagina.</p>

		<ol class="b-proto-overview__list">
			<?php foreach ( $protos as $key => $proto ) : ?>
				<li>
					<a class="b-proto-overview__item" href="/nav-prototypes/<?= $key; ?>">
						<span class="b-proto-overview__num"><?= sprintf( '%02d', array_search( $key, $keys ) + 1 ); ?></span>
						<span class="b-proto-overview__name"><?= $proto['name']; ?></span>
						<span class="b-proto-overview__status <?= $proto['status'] === 'Nieuw' ? 'is-new' : ''; ?>"><?= $proto['status']; ?></span>
						<span class="b-proto-overview__text"><?= $proto['text']; ?></span>
						<span class="b-proto-overview__page b-proto-caption">Bekijk &rarr;</span>
					</a>
				</li>
			<?php endforeach; ?>
		</ol>
	</section>

<?php else : ?>

	<?php
	$index = array_search( $slug, $keys );
	$prev  = $keys[ ( $index - 1 + count( $keys ) ) % count( $keys ) ];
	$next  = $keys[ ( $index + 1 ) % count( $keys ) ];
	?>

	<nav class="b-proto-nav" aria-label="Prototypes">
		<a class="b-proto-nav__arrow" href="/nav-prototypes/<?= $prev; ?>" aria-label="Vorige">&larr;</a>
		<a class="b-proto-nav__label" href="/nav-prototypes">
			<span class="b-proto-nav__num"><?= sprintf( '%02d', $index + 1 ); ?>/<?= sprintf( '%02d', count( $keys ) ); ?></span>
			Navigatie: <?= $protos[ $slug ]['name']; ?>
		</a>
		<a class="b-proto-nav__arrow" href="/nav-prototypes/<?= $next; ?>" aria-label="Volgende">&rarr;</a>
	</nav>

	<?php if ( $slug === 'menuknop' ) : ?>
		<div class="b-navproto-button js-navproto-button">
			<div class="o-container">
				<button type="button" class="b-navproto-button__toggle c-site-header__toggle js-navproto-open" tabindex="-1">
					<span class="font-display text-[1.01562rem] leading-none">Menu</span>
					<span class="c-site-header__bars">
						<span></span>
						<span></span>
					</span>
				</button>
			</div>
		</div>
	<?php endif; ?>

	<?php get_template_part( 'partials/prototypes/header-page-intro' ); ?>

	<?php get_template_part( 'partials/prototypes/body', null, array( 'body' => 'werkwijze' ) ); ?>

<?php endif; ?>

<?php get_footer(); ?>
