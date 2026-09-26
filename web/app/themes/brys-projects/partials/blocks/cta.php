<?php
/**
 * Centered heading with one link, used to close a page.
 *
 * @var array  $args
 * @var string $title
 * @var array  $link   array( 'label' => string, 'url' => string )
 * @var string $classes
 */
extract( $args );
$classes = $classes ?? '';
?>

<section class="b-cta <?= $classes; ?>">
	<div class="o-container flex flex-col items-center text-center pb-[12rem]">
		<h2 class="text-[5.25rem] leading-[5.5rem]" data-reveal="lines"><?= $title; ?></h2>
		<div class="flex mt-[3rem]" data-reveal="fade">
			<a href="<?= esc_url( $link['url'] ); ?>" class="c-link"><?= $link['label']; ?></a>
		</div>
	</div>
</section>
