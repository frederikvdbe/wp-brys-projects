<?php
/**
 * Toepassingen prototypes, served by includes/prototypes.php.
 * Without a slug: every layout stacked, with a label above each. With a slug: that
 * layout alone, on the light panel like on the microcement page.
 */
$protos = brys_toepassingen_prototypes();
$slug   = get_query_var( 'proto_slug' );
$keys   = array_keys( $protos );
$data   = brys_toepassingen_proto_data();

get_header();
?>

<?php if ( ! $slug ) : ?>

	<section class="b-proto-overview b-proto-overview--compact o-container">
		<p class="b-proto-caption opacity-70" data-reveal="fade">Prototypes &mdash; <a class="underline" href="/prototypes">naar alle prototypes</a></p>
		<h1 class="b-proto-overview__title" data-reveal="lines">Toepassingen prototypes</h1>
		<p class="b-proto-overview__intro" data-reveal="fade">Alle opties onder elkaar. Geen van de nieuwe opties heeft een muis nodig. Klik op een label om een optie apart te bekijken.</p>
	</section>

	<?php foreach ( $protos as $key => $proto ) : ?>
		<a class="b-proto-meta" href="/toepassingen-prototypes/<?= $key; ?>">
			<span class="o-container b-proto-meta__inner">
				<span class="b-proto-meta__key"><?= sprintf( '%02d', array_search( $key, $keys ) + 1 ); ?></span>
				<span class="b-proto-meta__status <?= $proto['status'] === 'Nieuw' ? 'is-new' : ''; ?>"><?= $proto['status']; ?></span>
				<span class="b-proto-meta__title"><?= $proto['name']; ?></span>
				<span class="b-proto-meta__text"><?= $proto['text']; ?></span>
				<span class="b-proto-meta__ref">Apart bekijken &rarr;</span>
			</span>
		</a>
		<div class="b-proto-stage">
			<?php get_template_part( 'partials/prototypes/toepassingen-' . $key, null, $data ); ?>
		</div>
	<?php endforeach; ?>

<?php else : ?>

	<?php
	$index = array_search( $slug, $keys );
	$prev  = $keys[ ( $index - 1 + count( $keys ) ) % count( $keys ) ];
	$next  = $keys[ ( $index + 1 ) % count( $keys ) ];
	?>

	<nav class="b-proto-nav" aria-label="Prototypes">
		<a class="b-proto-nav__arrow" href="/toepassingen-prototypes/<?= $prev; ?>" aria-label="Vorige">&larr;</a>
		<a class="b-proto-nav__label" href="/toepassingen-prototypes">
			<span class="b-proto-nav__num"><?= sprintf( '%02d', $index + 1 ); ?>/<?= sprintf( '%02d', count( $keys ) ); ?></span>
			Toepassingen: <?= $protos[ $slug ]['name']; ?>
		</a>
		<a class="b-proto-nav__arrow" href="/toepassingen-prototypes/<?= $next; ?>" aria-label="Volgende">&rarr;</a>
	</nav>

	<div class="b-proto-stage b-proto-stage--single">
		<?php get_template_part( 'partials/prototypes/toepassingen-' . $slug, null, $data ); ?>
	</div>

<?php endif; ?>

<?php get_footer(); ?>
