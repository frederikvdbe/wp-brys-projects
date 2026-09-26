<?php
/**
 * Photo wall built from rows on the 12 column grid, see the theme README.
 *
 * @var array  $args
 * @var array  $tiles   list of array( 'image' => string, 'ratio' => 'w/h', 'alt' => string, 'caption' => ?string, 'feature' => ?bool )
 * @var string $classes
 */
extract( $args );
$classes = $classes ?? '';

// Row layouts, used in turn. Each slot is a grid column start and span, with an
// optional drop in rem. Drop slots also move a little on scroll.
$layouts = array(
	array( 'align' => 'start', 'slots' => array( array( 1, 7 ), array( 9, 4 ) ) ),
	array( 'align' => 'start', 'slots' => array( array( 5, 5 ) ) ),
	array( 'align' => 'start', 'slots' => array( array( 2, 4 ), array( 7, 6, 14 ) ) ),
	array( 'align' => 'end', 'slots' => array( array( 1, 5 ), array( 7, 5 ) ) ),
	array( 'align' => 'start', 'slots' => array( array( 8, 5 ) ) ),
	array( 'align' => 'start', 'slots' => array( array( 1, 6, 10 ), array( 8, 4 ) ) ),
);
$row_gaps = array( 12, 8, 16, 10, 14 );

$is_portrait = function ( $tile ) {
	list( $width, $height ) = array_map( 'floatval', explode( '/', $tile['ratio'] ) );
	return $height > $width;
};

$rows    = array();
$layout  = 0;
$feature = 0;
$i       = 0;

while ( $i < count( $tiles ) ) {
	if ( ! empty( $tiles[ $i ]['feature'] ) ) {
		$rows[] = array(
			'type'  => 'feature-' . ( $feature++ % 2 ? 'left' : 'right' ),
			'tiles' => array( $tiles[ $i ] + array( 'number' => $i + 1 ) ),
		);
		$i++;
		continue;
	}

	// A row with one photo always shows a portrait: pull the next portrait forward,
	// or crop this photo to portrait when there is none left
	if ( count( $layouts[ $layout ]['slots'] ) === 1 && ! $is_portrait( $tiles[ $i ] ) ) {
		for ( $j = $i + 1; $j < count( $tiles ); $j++ ) {
			if ( empty( $tiles[ $j ]['feature'] ) && $is_portrait( $tiles[ $j ] ) ) {
				array_splice( $tiles, $i, 0, array_splice( $tiles, $j, 1 ) );
				break;
			}
		}
		if ( ! $is_portrait( $tiles[ $i ] ) ) {
			$tiles[ $i ]['ratio'] = '4/5';
		}
	}

	$row = array( 'type' => 'align-' . $layouts[ $layout ]['align'], 'tiles' => array() );
	foreach ( $layouts[ $layout ]['slots'] as $slot ) {
		if ( $i >= count( $tiles ) || ! empty( $tiles[ $i ]['feature'] ) ) {
			break;
		}
		$row['tiles'][] = $tiles[ $i ] + array(
			'number' => $i + 1,
			'column' => $slot[0] . ' / span ' . $slot[1],
			'drop'   => $slot[2] ?? 0,
		);
		$i++;
	}
	if ( count( $row['tiles'] ) === 1 && ! $is_portrait( $row['tiles'][0] ) ) {
		$row['tiles'][0]['ratio'] = '4/5';
	}
	$rows[] = $row;
	$layout = ( $layout + 1 ) % count( $layouts );
}
?>

<section class="b-wall <?= $classes; ?>">
	<div class="o-container">

		<?php foreach ( $rows as $r => $row ) : ?>
			<div class="b-wall__row b-wall__row--<?= $row['type']; ?> o-grid"
				 style="--row-gap: <?= $r ? $row_gaps[ $r % count( $row_gaps ) ] : 0; ?>rem">

				<?php foreach ( $row['tiles'] as $tile ) : ?>
					<figure class="b-wall__tile js-wall-tile"
							<?php if ( ! empty( $tile['drop'] ) ) : ?>data-speed="-0.08"<?php endif; ?>
							style="--ratio: <?= $tile['ratio']; ?>;<?php if ( ! empty( $tile['column'] ) ) : ?> --column: <?= $tile['column']; ?>; --drop: <?= $tile['drop']; ?>rem;<?php endif; ?>">

						<div class="b-wall__image">
							<img src="<?= get_template_directory_uri(); ?>/assets/dist/images/<?= $tile['image']; ?>"
								 loading="lazy" alt="<?= esc_attr( $tile['alt'] ?? '' ); ?>">
						</div>

						<figcaption class="c-eyebrow">
							<span><?= sprintf( '%02d', $tile['number'] ); ?></span>
							<?php if ( ! empty( $tile['caption'] ) ) : ?>
								<span><?= $tile['caption']; ?></span>
							<?php endif; ?>
						</figcaption>

					</figure>
				<?php endforeach; ?>

			</div>
		<?php endforeach; ?>

	</div>
</section>
