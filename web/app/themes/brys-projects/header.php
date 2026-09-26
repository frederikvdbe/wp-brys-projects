<?php
/**
 * @var array $args
 * @var string $header_classes
 */
$args = $args ?? array();
extract( $args );
$header_classes = $header_classes ?? '';
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header class="c-site-header<?php if ( ! empty( $header_classes ) ) echo ' ' . $header_classes; ?>">
	<div class="o-container">
		<div class="c-site-header__inner pt-[0.25rem]">

			<div class="justify-self-start">
				<a href="/contact" class="c-link c-link--sm">Contacteer ons</a>
			</div>

			<div class="c-site-header__logo justify-self-center">
				<a href="<?php echo home_url(); ?>">
					<img src="<?= get_template_directory_uri(); ?>/assets/dist/images/logo.png" width="500" height="221" alt="Brys Projects">
				</a>
			</div>

			<button type="button" class="c-site-header__toggle js-menu-open justify-self-end relative top-[0.125rem]">
				<span class="font-display text-[1.01562rem] leading-none">Menu</span>
				<span class="c-site-header__bars">
					<span></span>
					<span></span>
				</span>
			</button>

		</div>
	</div>
</header>

<main class="site-main">
