<?php
/**
 * Call to action prototypes, served by includes/prototypes.php.
 * Without a slug: every option stacked, with a label above each. With a slug: that
 * option at the end of a real page.
 */
$protos = brys_cta_prototypes();
$slug   = get_query_var( 'proto_slug' );
$keys   = array_keys( $protos );

get_header();
?>

<?php if ( ! $slug ) : ?>

	<section class="b-proto-overview b-proto-overview--compact o-container">
		<p class="b-proto-caption opacity-70" data-reveal="fade">Prototypes &mdash; <a class="underline" href="/hero-prototypes">naar de hero prototypes</a></p>
		<h1 class="b-proto-overview__title" data-reveal="lines">CTA prototypes</h1>
		<p class="b-proto-overview__intro" data-reveal="fade">Alle opties onder elkaar. Klik op een label om de CTA onderaan een echte pagina te zien.</p>
	</section>

	<?php foreach ( $protos as $key => $proto ) : ?>
		<a class="b-proto-meta" href="/cta-prototypes/<?= $key; ?>">
			<span class="o-container b-proto-meta__inner">
				<span class="b-proto-meta__key"><?= sprintf( '%02d', array_search( $key, $keys ) + 1 ); ?></span>
				<span class="b-proto-meta__status <?= $proto['status'] === 'Nieuw' ? 'is-new' : ''; ?>"><?= $proto['status']; ?></span>
				<span class="b-proto-meta__title"><?= $proto['name']; ?></span>
				<span class="b-proto-meta__text"><?= $proto['text']; ?></span>
				<span class="b-proto-meta__ref">Bekijk op een pagina &rarr;</span>
			</span>
		</a>
		<?php get_template_part( 'partials/prototypes/cta-' . $key ); ?>
	<?php endforeach; ?>

<?php else : ?>

	<?php
	$index = array_search( $slug, $keys );
	$prev  = $keys[ ( $index - 1 + count( $keys ) ) % count( $keys ) ];
	$next  = $keys[ ( $index + 1 ) % count( $keys ) ];
	?>

	<nav class="b-proto-nav" aria-label="Prototypes">
		<a class="b-proto-nav__arrow" href="/cta-prototypes/<?= $prev; ?>" aria-label="Vorige">&larr;</a>
		<a class="b-proto-nav__label" href="/cta-prototypes">
			<span class="b-proto-nav__num"><?= sprintf( '%02d', $index + 1 ); ?>/<?= sprintf( '%02d', count( $keys ) ); ?></span>
			CTA: <?= $protos[ $slug ]['name']; ?>
		</a>
		<a class="b-proto-nav__arrow" href="/cta-prototypes/<?= $next; ?>" aria-label="Volgende">&rarr;</a>
	</nav>

	<?php get_template_part( 'partials/prototypes/header-page-intro' ); ?>

	<?php get_template_part( 'partials/prototypes/body', null, array( 'body' => 'werkwijze', 'cta' => false ) ); ?>

	<?php get_template_part( 'partials/prototypes/cta-' . $slug ); ?>

<?php endif; ?>

<?php get_footer(); ?>
