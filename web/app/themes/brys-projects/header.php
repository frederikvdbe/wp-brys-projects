<?php
/**
 * @var array $args
 * @var string $header_classes
 * @var string $logo_classes
 * @var string $main_classes
 */
extract( $args );
$logo_classes = ! empty( $logo_classes ) ? $logo_classes : '';
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header class="c-site-header<?php if( ! empty( $header_classes ) ) echo ' ' . $header_classes; ?>">
	<div class="o-container flex items-center">

		<div class="c-site-header__logo">
			<a href="<?php echo home_url(); ?>">
				<?php get_template_part( 'partials/vectors/logo.svg' ); ?>
			</a>
		</div>

		<nav class="c-site-header__nav">
			<?php wp_nav_menu( array(
				'container' => false,
				'theme_location' => 'header-nav',
				'menu_class' => 'c-site-header__menu'
			) ); ?>
		</nav>

		<button class="c-site-header__toggle js-mobile-nav-toggle c-hamburger hamburger  hamburger--minus" type="button">
  			<span class="hamburger-box">
    			<span class="hamburger-inner"></span>
  			</span>
		</button>

	</div>
</header>

<main class="site-main<?php if( ! empty( $header_classes ) ) echo ' ' . $header_classes; ?>">
