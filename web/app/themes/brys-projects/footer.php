</main>

<?php get_template_part( 'partials/blocks/footer', null, array(
	'address'  => array(
		'Louis Delebecquelaan 34',
		'9051 Sint-Denijs-Westrem',
		'<a href="mailto:sales@brys-projects.be">sales@brys-projects.be</a>',
	),
	'columns'  => array(
		array(
			'title' => 'Onze diensten',
			'items' => array(
				array( 'label' => 'Binnenafwerking', 'url' => '/diensten/binnenhuisafwerking' ),
				array( 'label' => 'Badkamers', 'url' => '/diensten/badkamers' ),
				array( 'label' => 'Microcement', 'url' => '/diensten/microcement' ),
			),
		),
		array(
			'title' => 'Onze projecten',
			'items' => array(
				array( 'label' => 'Binnenafwerking', 'url' => '/projecten/binnenhuisafwerking' ),
				array( 'label' => 'Badkamers', 'url' => '/projecten/badkamers' ),
				array( 'label' => 'Microcement', 'url' => '/projecten/microcement' ),
			),
		),
	),
	'copyright' => '&copy; Brys Projects &nbsp;&mdash;&nbsp; Alle rechten voorbehouden',
	'legal'     => array(
		array( 'label' => 'Privacybeleid', 'url' => '/privacy-policy' ),
		array( 'label' => 'Cookiebeleid', 'url' => '/cookie-policy' ),
		array( 'label' => 'Disclaimer', 'url' => '/disclaimer' ),
	),
	'credits'   => array( 'label' => 'Website door frederikvd.be', 'url' => 'https://frederikvd.be' ),
) ); ?>

<?php get_template_part( 'partials/components/menu' ); ?>

<?php wp_footer(); ?>

<?php // get_template_part( 'partials/components/debug-grid' ); ?>

</body>
</html>
