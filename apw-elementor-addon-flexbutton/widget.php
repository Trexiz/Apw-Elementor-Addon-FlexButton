<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function apw_elementor_categories( $elements_manager ) {

	$elements_manager->add_category(
		'first-category',
		[
			'title' => __( 'APW Elementor Addon', 'apw-elementor-addon-flexbutton' ),
			'icon' => 'fa fa-plug',
		]
	);

}
add_action( 'elementor/elements/categories_registered', 'apw_elementor_categories' );


	// Кнопка
	require( 'widgets/flex-button.php' );
