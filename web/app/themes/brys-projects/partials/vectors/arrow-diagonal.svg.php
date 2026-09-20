<?php
/**
 * @var array $args
 * @var float $size Size in px as drawn in the design, output in rem so it scales
 */
$size = ( $args['size'] ?? 17 ) / 16;
?>
<svg viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="shrink-0" style="width: <?= $size; ?>rem; height: <?= $size; ?>rem;">
	<path d="M1.4 1.4 15.6 15.6M15.6 15.6V5.3M15.6 15.6H5.3" stroke="currentColor" stroke-width="1.1"/>
</svg>
