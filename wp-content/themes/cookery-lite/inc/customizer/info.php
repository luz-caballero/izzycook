<?php
/**
 * Cookery Lite Theme Info
 *
 * @package Cookery_Lite
 */

function cookery_lite_customizer_theme_info( $wp_customize ) {
    
    $wp_customize->add_section( 'theme_info', array(
        'title'       => __( 'Demo & Documentation' , 'cookery-lite' ),
        'priority'    => 6,
    ) );
    
    /** Important Links */
    $wp_customize->add_setting( 'theme_info_theme',
        array(
            'default' => '',
            'sanitize_callback' => 'wp_kses_post',
        )
    );
    
    $theme_info = '<p>';
    $theme_info .= sprintf( __( 'Demo Link: %1$sClick here.%2$s', 'cookery-lite' ),  '<a href="' . esc_url( 'https://blossomthemes.com/theme-demo/?theme=cookery-lite' ) . '" target="_blank">', '</a>' );
    $theme_info .= '</p><p>';
    $theme_info .= sprintf( __( 'Documentation Link: %1$sClick here.%2$s', 'cookery-lite' ),  '<a href="' . esc_url( 'https://docs.blossomthemes.com/cookery-lite/' ) . '" target="_blank">', '</a>' );
    $theme_info .= '</p>';

    $wp_customize->add_control( new Cookery_Lite_Note_Control( $wp_customize,
        'theme_info_theme', 
            array(
                'section'     => 'theme_info',
                'description' => $theme_info
            )
        )
    );
    
}
add_action( 'customize_register', 'cookery_lite_customizer_theme_info' );

if( class_exists( 'WP_Customize_Section' ) ) :
/**
 * Adding Go to Pro Section in Customizer
 * https://github.com/justintadlock/trt-customizer-pro
 */
class Cookery_Lite_Customize_Section_Pro extends WP_Customize_Section {

    /**
     * The type of customize section being rendered.
     *
     * @since  1.0.0
     * @access public
     * @var    string
     */
    public $type = 'cookery-lite-pro-section';

    /**
     * Custom button text to output.
     *
     * @since  1.0.0
     * @access public
     * @var    string
     */
    public $pro_text = '';

    /**
     * Custom pro button URL.
     *
     * @since  1.0.0
     * @access public
     * @var    string
     */
    public $pro_url = '';

    /**
     * Add custom parameters to pass to the JS via JSON.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function json() {
        $json = parent::json();

        $json['pro_text'] = $this->pro_text;
        $json['pro_url']  = esc_url( $this->pro_url );

        return $json;
    }

    /**
     * Outputs the Underscore.js template.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    protected function render_template() { ?>
        <li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">
            <h3 class="accordion-section-title">
                {{ data.title }}
                <# if ( data.pro_text && data.pro_url ) { #>
                    <a href="{{{ data.pro_url }}}" class="button button-secondary alignright" target="_blank">{{ data.pro_text }}</a>
                <# } #>
            </h3>
        </li>
    <?php }
}
endif;

/**
 * Add Pro Button
*/
function cookery_lite_page_sections_pro( $manager ) {
    // Register custom section types.
    $manager->register_section_type( 'Cookery_Lite_Customize_Section_Pro' );

    // Register sections.
    $manager->add_section(
        new Cookery_Lite_Customize_Section_Pro(
            $manager,
            'cookery_lite_page_view_pro',
            array(
                'title'    => esc_html__( 'Pro Available', 'cookery-lite' ),
                'priority' => 5, 
                'pro_text' => esc_html__( 'VIEW PRO THEME', 'cookery-lite' ),
                'pro_url'  => esc_url( 'https://blossomthemes.com/wordpress-themes/cookery/?utm_source=cookery_lite&utm_medium=customizer&utm_campaign=upgrade_to_pro' )
            )
        )
    );
}
add_action( 'customize_register', 'cookery_lite_page_sections_pro' );