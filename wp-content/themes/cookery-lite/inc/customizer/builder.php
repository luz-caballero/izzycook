<?php
/**
 * Builder Settings
 *
 * @package Cookery
*/
if ( ! function_exists( 'cookery_lite_customize_register_general_frontpage_builder' ) ) : 

function cookery_lite_customize_register_general_frontpage_builder( $wp_customize ){

    $wp_customize->add_section( 
        'home_page_builder',
        array(
            'priority' => 5,
            'title'    => __( 'Homepage Builder', 'cookery-lite' )
        ) 
    );

    /** Home Page Builder layouts */
    $wp_customize->add_setting( 
        'builder_types', 
        array(
            'default'           => 'customizer',
            'sanitize_callback' => 'cookery_lite_sanitize_radio',
            
        ) 
    );
    
    $wp_customize->add_control(
        'builder_types',
        array(
            'type'     => 'radio',
            'section'  => 'home_page_builder',
            'label'    => __( 'Choose Home Page Builder', 'cookery-lite' ),
            'priority' => 5,
            'choices'  => array(
                'customizer' => __( 'Customizer', 'cookery-lite' ),
                'builder'    => __( 'Page Builder', 'cookery-lite' ),
            ),
        )
    );

    /** Banner Link Text */
    $wp_customize->add_setting(
        'builder_types_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Cookery_Lite_Note_Control( 
            $wp_customize,
            'builder_types_text',
            array(
                'section'     => 'home_page_builder',
                'description' => __( 'Refresh the Customizer after publishing new changes.', 'cookery-lite' ),
                'priority'    => 20,
            )
        )
    );
}
endif;
add_action( 'customize_register', 'cookery_lite_customize_register_general_frontpage_builder' );