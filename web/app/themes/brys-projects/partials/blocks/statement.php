<?php
/**
 * Green statement followed by three numbered pillars.
 * Sizes come from the 1920px design and are written in rem, see the theme README.
 *
 * @var array $args
 * @var string $statement  Large green statement, use <br> for the line break from the design
 * @var array  $pillars    list of array( 'number' => string, 'title' => string, 'text' => string )
 * @var string $classes
 */
extract( $args );
$classes = $classes ?? '';
?>

<section class="b-statement <?= $classes; ?>">
	<div class="o-container">
		<div class="o-grid">

			<h2 class="sm:col-span-10 sm:col-start-2 text-[6.15rem] leading-[7.5rem] text-sage">
				<?= $statement; ?>
			</h2>

		</div>

		<ul class="o-grid mt-[7.875rem]">
			<?php foreach ( $pillars as $index => $pillar ) : ?>
				<li class="sm:col-span-3<?= $index === 0 ? ' sm:col-start-2' : ''; ?>">

					<h3 class="text-[1.84375rem] leading-[1.6875rem] font-[450] flex gap-[0.875rem]">
						<span class="text-sage"><?= $pillar['number']; ?></span>
						<span><?= $pillar['title']; ?></span>
					</h3>

					<p class="mt-[1.75rem] text-[1.1rem] leading-[1.625rem]"><?= $pillar['text']; ?></p>

				</li>
			<?php endforeach; ?>
		</ul>

	</div>
</section>
