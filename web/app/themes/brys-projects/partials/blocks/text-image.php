<?php
/**
 * @var array $args
 * @var string $title
 * @var string $text
 * @var array $button
 * @var string
 * @var array $image
 * @var string $image_position
 * @var bool $image_overflow
 * @var string $classes
 */

extract($args);
$title = !empty($title) ? $title : "The quick fox jumps";
$text = !empty($text) ? $text : "<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur deserunt dolore eaque enim, eos, maiores minus quas quibusdam quo reprehenderit temporibus vel voluptatem, voluptatibus. Ad enim illum nulla ratione repellat!</p>";
$button = !empty($button) ? $button : array(
	'classes' => 'mt-8'
);
$image_position = !empty($image_position) ? $image_position : 'left';
$image_overflow = !empty($image_overflow) ? $image_overflow : false;
$classes = !empty($classes) ? $classes : '';

if($image_overflow) $classes .= " c-text-image--overflow";
?>

<section class="c-text-image <?= " c-text-image--image-$image_position"; ?> <?= $classes; ?>">
	<div class="o-container o-grid">
		<div class="c-text-image__col-image col-span-12 md:col-span-6 <?=$image_position == 'left' ? 'md:order-1' : 'md:order-2'; ?>">
			<img class="c-text-image__image" src="https://images.unsplash.com/photo-1718115257239-7246f434a7b0?q=60&w=800&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
		</div>
		<div class="c-text-image__col-text col-span-12 md:col-span-6 content-center <?= $image_position == 'left' ? 'lg:col-start-7 md:order-2' : 'md:order-1'; ?>">
			<?php if(!empty($title)): ?>
				<h2 class="mb-8"><?= $title; ?></h2>
			<?php endif; ?>
			<?php if(!empty($text)) : ?>
				<?= $text; ?>
			<?php endif; ?>
			<?php if(!empty($button)) : ?>
				<?php get_template_part('partials/components/button', null, $button); ?>
			<?php endif; ?>
		</div>
	</div>
</section>
