<?php
/**
 * List of rows with a large title and a short text.
 *
 * @var array  $args
 * @var string $title
 * @var array  $items    array( 'title' => string, 'text' => string )
 * @var bool   $narrow   Optional, use 10 columns with a 1 column offset
 * @var string $classes
 */
extract( $args );
$classes = $classes ?? '';
$narrow  = $narrow ?? false;
?>

<section class="b-index <?= $classes; ?>">
	<div class="o-container">

		<?php if ( $narrow ) : ?><div class="o-grid"><div class="b-index__narrow"><?php endif; ?>

		<h2 class="text-[2.7125rem] leading-[2.625rem]" data-reveal="lines"><?= $title; ?></h2>

		<ul class="b-index__list mt-[5.0625rem] border-b border-ink">
			<?php foreach ( $items as $item ) : ?>
				<li class="b-index__row o-grid items-baseline py-[2.75rem] border-t border-ink" data-reveal="fade">
					<h3 class="b-index__title sm:col-span-7 text-[3.5rem] leading-[3.75rem]"><?= $item['title']; ?></h3>
					<p class="sm:col-span-4 sm:col-start-8 text-[1.1rem] leading-[1.625rem]"><?= $item['text']; ?></p>
				</li>
			<?php endforeach; ?>
		</ul>

		<?php if ( $narrow ) : ?></div></div><?php endif; ?>

	</div>
</section>
