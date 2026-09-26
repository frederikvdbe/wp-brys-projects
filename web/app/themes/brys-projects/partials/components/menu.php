<?php
/**
 * Full screen menu overlay, opened by the Menu button in the site header.
 * The animation lives in assets/js/menu.js.
 */
$items = array(
	array( 'label' => 'Diensten', 'url' => '/diensten' ),
	array( 'label' => 'Realisaties', 'url' => '/realisaties' ),
	array( 'label' => 'Over ons', 'url' => '/over-ons' ),
	array( 'label' => 'Contact', 'url' => '/contact' ),
);
?>
<div class="c-menu js-menu" id="site-menu" aria-hidden="true" inert>
	<div class="c-menu__backdrop js-menu-close"></div>

	<nav class="c-menu__panel js-menu-panel" aria-label="Hoofdmenu">
		<div class="c-menu__head">
			<button type="button" class="c-menu__close js-menu-close">
				<span class="font-display text-[1.01562rem] leading-none">Close</span>
				<span class="c-menu__bars">
					<span></span>
					<span></span>
				</span>
			</button>
		</div>

		<ul class="c-menu__list">
			<?php foreach ( $items as $item ) : ?>
				<li class="c-menu__item">
					<a href="<?= esc_url( $item['url'] ); ?>" class="c-menu__link">
						<span class="c-menu__mask">
							<span class="c-menu__label js-menu-label"><?= esc_html( $item['label'] ); ?></span>
						</span>
						<span class="c-menu__arrow">
							<svg viewBox="0 0 17 17" fill="none" aria-hidden="true">
								<path d="M1.4 15.6 15.6 1.4M15.6 1.4V11.7M15.6 1.4H5.3" stroke="currentColor" stroke-width="1.1"/>
							</svg>
						</span>
						<span class="c-menu__rule js-menu-rule"></span>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</nav>
</div>
