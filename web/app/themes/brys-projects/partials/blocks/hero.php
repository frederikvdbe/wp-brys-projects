<?php
/**
 * @var array $args
 * @var string $title
 * @var bool $skip
 * @var string $classes
 */

extract($args);
?>

<section class="b-hero">
	<div class="o-container o-grid">
		<h1><?= $ttle; ?></h1>
		<p><?= $text; ?></p>
		<div class="flex">
			<?php get_template_part('components/button', null, array()); ?>
		</div>
	</div>
</section>
