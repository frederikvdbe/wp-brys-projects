<?php
/**
 * @var array $args
 * @var string $type
 * @var string $color
 * @var string $label
 * @var string $url
 * @var string $classes
 */
extract( $args );
$type = !empty($type) ? $type : '';
$color = !empty($color) ? $color : 'primary';
$label = !empty($label) ? $label : 'Primary button';
$url = !empty($url) ? $url : '#';
$classes = !empty($classes) ? $classes : 'c-button--primary';
?>

<a href="<?= $url; ?>" class="c-button<?php if(!empty($type)) echo '-' . $type; ?><?php if(!empty($color)) echo ' c-button--' . $color; ?> <?= $classes; ?>">
	<?= $label; ?>
</a>
