</main>

<?php if ( ! get_query_var( 'hide_site_footer' ) ) get_template_part( 'partials/blocks/site-footer', null, array(
	'lead'    => 'Binnenafwerking, badkamers en microcement. Met één ploeg, van plan tot oplevering.',
	'email'   => 'sales@brys-projects.be',
	'columns' => array(
		array(
			'title' => 'Diensten',
			'items' => array(
				array( 'label' => 'Binnenafwerking', 'url' => '/diensten/binnenhuisafwerking' ),
				array( 'label' => 'Badkamers', 'url' => '/diensten/badkamers' ),
				array( 'label' => 'Microcement', 'url' => '/microcement' ),
			),
		),
		array(
			'title' => 'Brys',
			'items' => array(
				array( 'label' => 'Realisaties', 'url' => '/realisaties' ),
				array( 'label' => 'Werkwijze', 'url' => '/werkwijze' ),
				array( 'label' => 'Over ons', 'url' => '/over-ons' ),
				array( 'label' => 'Contact', 'url' => '/contact' ),
			),
		),
		array(
			'title' => 'Bezoek',
			'items' => array(
				'Louis Delebecquelaan 34',
				'9051 Sint-Denijs-Westrem',
			),
		),
	),
	'legal'   => array(
		array( 'label' => 'Privacybeleid', 'url' => '/privacy-policy' ),
		array( 'label' => 'Cookiebeleid', 'url' => '/cookie-policy' ),
		array( 'label' => 'Disclaimer', 'url' => '/disclaimer' ),
	),
	'credits' => array( 'label' => 'Website door frederikvd.be', 'url' => 'https://frederikvd.be' ),
) ); ?>

<?php get_template_part( 'partials/components/menu' ); ?>

<?php wp_footer(); ?>

<?php // get_template_part( 'partials/components/debug-grid' ); ?>

</body>
</html>
