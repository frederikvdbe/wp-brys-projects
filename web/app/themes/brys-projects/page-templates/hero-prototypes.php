<?php
/**
 * Page header prototypes, served by includes/prototypes.php.
 * Without a slug: overview of all prototypes. With a slug: that header, followed
 * by the content of the page it was made for.
 */
$protos = brys_prototypes();
$slug   = get_query_var( 'proto_slug' );
$keys   = array_keys( $protos );

get_header();
?>

<?php if ( ! $slug ) : ?>

	<section class="b-proto-overview o-container">
		<p class="b-proto-caption opacity-70" data-reveal="fade">Prototypes &mdash; paginahoofding voor subpagina&rsquo;s &mdash; <a class="underline" href="/cta-prototypes">naar de CTA prototypes</a></p>
		<h1 class="b-proto-overview__title" data-reveal="lines">Hero prototypes</h1>

		<ol class="b-proto-overview__list">
			<?php foreach ( $protos as $key => $proto ) : ?>
				<li data-reveal="fade">
					<a class="b-proto-overview__item" href="/hero-prototypes/<?= $key; ?>">
						<span class="b-proto-overview__num"><?= sprintf( '%02d', array_search( $key, $keys ) + 1 ); ?></span>
						<span class="b-proto-overview__name"><?= $proto['name']; ?></span>
						<span class="b-proto-overview__status <?= $proto['status'] === 'Nieuw' ? 'is-new' : ''; ?>"><?= $proto['status']; ?></span>
						<span class="b-proto-overview__text"><?= $proto['text']; ?></span>
						<span class="b-proto-overview__page b-proto-caption">Inhoud: <?= $proto['body']; ?></span>
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
		<a class="b-proto-nav__arrow" href="/hero-prototypes/<?= $prev; ?>" aria-label="Vorige">&larr;</a>
		<a class="b-proto-nav__label" href="/hero-prototypes">
			<span class="b-proto-nav__num"><?= sprintf( '%02d', $index + 1 ); ?>/<?= sprintf( '%02d', count( $keys ) ); ?></span>
			<?= $protos[ $slug ]['name']; ?>
		</a>
		<a class="b-proto-nav__arrow" href="/hero-prototypes/<?= $next; ?>" aria-label="Volgende">&rarr;</a>
	</nav>

	<?php get_template_part( 'partials/prototypes/header-' . $slug ); ?>

	<?php get_template_part( 'partials/prototypes/body', null, array( 'body' => $protos[ $slug ]['body'] ) ); ?>

<?php endif; ?>

<?php get_footer(); ?>
