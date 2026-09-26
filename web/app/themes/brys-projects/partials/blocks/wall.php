<?php
/**
 * Masonry photo wall. The photos are spread over 3 columns in PHP, see the theme README.
 *
 * @var array  $args
 * @var array  $tiles   list of array( 'image' => string, 'ratio' => 'w/h', 'alt' => string, 'caption' => ?string )
 * @var string $classes
 */
extract( $args );
$classes = $classes ?? '';

// Column width in rem at 1920px, used to add up the column heights
$column_width = 31.5;
// Each list repeats with its own length, so the pattern looks random
$offsets      = array( 0, 20, 8 );
$speeds       = array( 0, -0.12, 0.08 );
$widths       = array( 100, 60, 84, 52, 92, 70, 100, 46 );
$aligns       = array( 'start', 'end', 'center', 'end', 'start', 'center', 'end' );
$gaps         = array( 7, 12, 4.5, 15, 9, 5.5 );

$columns = array();
foreach ( $offsets as $offset ) {
	$columns[] = array( 'offset' => $offset, 'height' => $offset / $column_width, 'tiles' => array() );
}

foreach ( $tiles as $i => $tile ) {
	list( $ratio_w, $ratio_h ) = array_map( 'floatval', explode( '/', $tile['ratio'] ) );

	$tile['number'] = sprintf( '%02d', $i + 1 );
	$tile['width']  = $widths[ $i % count( $widths ) ];
	$tile['align']  = $aligns[ $i % count( $aligns ) ];
	$tile['gap']    = $gaps[ $i % count( $gaps ) ];

	$target = 0;
	foreach ( $columns as $key => $column ) {
		if ( $column['height'] < $columns[ $target ]['height'] ) {
			$target = $key;
		}
	}

	$columns[ $target ]['height'] += ( $tile['width'] / 100 ) * ( $ratio_h / $ratio_w ) + $tile['gap'] / $column_width;
	$columns[ $target ]['tiles'][] = $tile;
}
?>

<section class="b-wall <?= $classes; ?>">
	<div class="o-container">
		<div class="b-wall__columns">

			<?php foreach ( $columns as $c => $column ) : ?>
				<div class="b-wall__column js-wall-column"
					 data-speed="<?= $speeds[ $c ]; ?>"
					 style="--offset: <?= $column['offset']; ?>rem">

					<?php foreach ( $column['tiles'] as $tile ) : ?>
						<figure class="b-wall__tile js-wall-tile b-wall__tile--<?= $tile['align']; ?>"
								style="--width: <?= $tile['width']; ?>%; --gap: <?= $tile['gap']; ?>rem; --ratio: <?= $tile['ratio']; ?>">

							<div class="b-wall__image">
								<img src="<?= get_template_directory_uri(); ?>/assets/dist/images/<?= $tile['image']; ?>"
									 loading="lazy" alt="<?= esc_attr( $tile['alt'] ?? '' ); ?>">
							</div>

							<figcaption class="c-eyebrow">
								<span><?= $tile['number']; ?></span>
								<?php if ( ! empty( $tile['caption'] ) ) : ?>
									<span><?= $tile['caption']; ?></span>
								<?php endif; ?>
							</figcaption>

						</figure>
					<?php endforeach; ?>

				</div>
			<?php endforeach; ?>

		</div>
	</div>
</section>
