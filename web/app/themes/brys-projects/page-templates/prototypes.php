<?php
/**
 * Overview of every prototype group, served by includes/prototypes.php at /prototypes.
 */
$groups = array(
	'hero'   => array( 'name' => 'Hero', 'text' => 'Paginahoofding voor subpagina\'s.', 'protos' => brys_prototypes() ),
	'cta'    => array( 'name' => 'CTA', 'text' => 'Oproep tot actie onderaan een pagina.', 'protos' => brys_cta_prototypes() ),
	'footer' => array( 'name' => 'Footer', 'text' => 'Voettekst van de site.', 'protos' => brys_footer_prototypes() ),
	'nav'    => array( 'name' => 'Navigatie', 'text' => 'Gedrag van de header bij het scrollen.', 'protos' => brys_nav_prototypes() ),
);

get_header();
?>

<section class="b-proto-overview o-container">
	<p class="b-proto-caption opacity-70" data-reveal="fade">Prototypes &mdash; alle ontwerpen om te vergelijken</p>
	<h1 class="b-proto-overview__title" data-reveal="lines">Prototypes</h1>

	<?php foreach ( $groups as $type => $group ) : ?>
		<?php $keys = array_keys( $group['protos'] ); ?>

		<div class="b-proto-group">
			<a class="b-proto-group__head" data-reveal="fade" href="/<?= $type; ?>-prototypes">
				<h2 class="b-proto-group__title"><?= $group['name']; ?></h2>
				<span class="b-proto-group__text"><?= $group['text']; ?> <?= count( $keys ); ?> opties.</span>
				<span class="b-proto-group__all">Alles onder elkaar &rarr;</span>
			</a>

			<ol class="b-proto-overview__list">
				<?php foreach ( $group['protos'] as $key => $proto ) : ?>
					<li>
						<a class="b-proto-overview__item" href="/<?= $type; ?>-prototypes/<?= $key; ?>">
							<span class="b-proto-overview__num"><?= sprintf( '%02d', array_search( $key, $keys ) + 1 ); ?></span>
							<span class="b-proto-overview__name"><?= $proto['name']; ?></span>
							<span class="b-proto-overview__status <?= $proto['status'] === 'Nieuw' ? 'is-new' : ''; ?>"><?= $proto['status']; ?></span>
							<span class="b-proto-overview__text"><?= $proto['text']; ?></span>
							<span class="b-proto-overview__page b-proto-caption">Bekijk &rarr;</span>
						</a>
					</li>
				<?php endforeach; ?>
			</ol>
		</div>
	<?php endforeach; ?>
</section>

<?php get_footer(); ?>
