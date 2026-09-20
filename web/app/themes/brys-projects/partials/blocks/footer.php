<?php
/**
 * Site footer: logo and address, two link columns, and a legal row under a rule.
 * Sizes come from the 1920px design and are written in rem, see the theme README.
 *
 * @var array $args
 * @var array  $address    list of html strings
 * @var array  $columns    list of array( 'title' => string, 'items' => list of array( 'label', 'url' ) )
 * @var string $copyright
 * @var array  $legal      list of array( 'label', 'url' )
 * @var array  $credits    array( 'label', 'url' )
 * @var string $classes
 */
extract( $args );
$classes = $classes ?? '';
?>

<footer class="c-site-footer <?= $classes; ?>">

	<div class="o-container">
		<div class="o-grid pt-[12.25rem] text-[1.09375rem] leading-[1.625rem]">

			<div class="sm:col-span-4">
				<img class="c-site-footer__logo"
					 src="<?= get_template_directory_uri(); ?>/assets/dist/images/logo-white.png"
					 width="500" height="221" alt="Brys Projects">

				<ul class="c-site-footer__list mt-[2.875rem]">
					<?php foreach ( $address as $line ) : ?>
						<li><?= $line; ?></li>
					<?php endforeach; ?>
				</ul>
			</div>

			<?php foreach ( $columns as $column ) : ?>
				<div class="sm:col-span-4">
					<h2 class="c-site-footer__title mt-[4.3125rem]"><?= $column['title']; ?></h2>

					<ul class="c-site-footer__list mt-[1.1875rem]">
						<?php foreach ( $column['items'] as $item ) : ?>
							<li><a href="<?= esc_url( $item['url'] ); ?>"><?= $item['label']; ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endforeach; ?>

		</div>
	</div>

	<div class="c-site-footer__rule o-bleed-right mt-[12rem]"></div>

	<div class="o-container">
		<div class="o-grid pt-[5.1875rem] pb-[5.0625rem] text-[0.95375rem] leading-[1rem] text-paper">

			<p class="sm:col-span-4"><?= $copyright; ?></p>

			<p class="sm:col-span-4 flex gap-[1rem]">
				<?php foreach ( $legal as $index => $item ) : ?>
					<?php if ( $index > 0 ) : ?><span>&mdash;</span><?php endif; ?>
					<a href="<?= esc_url( $item['url'] ); ?>"><?= $item['label']; ?></a>
				<?php endforeach; ?>
			</p>

			<p class="sm:col-span-4">
				<a href="<?= esc_url( $credits['url'] ); ?>"><?= $credits['label']; ?></a>
			</p>

		</div>
	</div>

</footer>
