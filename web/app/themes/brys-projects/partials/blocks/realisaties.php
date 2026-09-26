<?php
/**
 * Three project cards with a heading and a link above them.
 * Sizes come from the 1920px design and are written in rem, see the theme README.
 *
 * @var array $args
 * @var string $title
 * @var array  $link   array( 'label' => string, 'url' => string )
 * @var array  $cards  list of array( 'label' => string, 'url' => string, 'image' => string, 'image_alt' => string )
 * @var string $classes
 */
extract( $args );
$classes = $classes ?? '';
?>

<section class="b-realisaties <?= $classes; ?>" data-reveal-sequence>
	<div class="o-container">

		<div class="flex items-end justify-between">
			<h2 class="text-[2.7125rem] leading-[2.625rem]" data-reveal="lines"><?= $title; ?></h2>
			<a href="<?= esc_url( $link['url'] ); ?>" class="c-link relative top-[0.5625rem]" data-reveal="fade"><?= $link['label']; ?></a>
		</div>

		<ul class="o-grid mt-[5.0625rem]">
			<?php foreach ( $cards as $card ) : ?>
				<li class="sm:col-span-4">
					<a href="<?= esc_url( $card['url'] ); ?>" class="b-realisaties__card block">

						<span class="b-realisaties__media block" data-reveal="image">
							<img class="w-full h-[40.625rem] object-cover"
								 src="<?= get_template_directory_uri(); ?>/assets/dist/images/<?= $card['image']; ?>"
								 width="504" height="650" alt="<?= esc_attr( $card['image_alt'] ?? '' ); ?>">
						</span>

						<span data-reveal="fade" class="b-realisaties__label c-label relative mt-[3.5rem] pb-[1.3125rem] flex items-center justify-between border-b border-ink">
							<?= $card['label']; ?>
							<span class="b-realisaties__arrow">
								<?php get_template_part( 'partials/vectors/arrow-diagonal.svg' ); ?>
							</span>
						</span>

					</a>
				</li>
			<?php endforeach; ?>
		</ul>

	</div>
</section>
