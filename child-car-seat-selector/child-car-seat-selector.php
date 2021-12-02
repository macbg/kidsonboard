<?php
/**
 * @wordpress-plugin
 * Plugin Name: Child Car Seat Selector
 * Description: Child car seat selector widget. It redirects to a specific wordpress info page, based on the provided age, wieght and height.
 * Version: 1.0.0
 * Author: Krasimir Markov
 * Author URI: https://www.linkedin.com/in/krasimir-markov
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       child-car-seat-selector
 */

/* Start Adding Functions Below this Line */

$plugin_name = "child-car-seat-selector";
$plugin_version = "1.0.0";

wp_enqueue_style( $plugin_name, plugin_dir_url( __FILE__ ) . 'public/css/child-car-seat-selector.css', array(), $plugin_version, 'all' );
wp_enqueue_script( $plugin_name, plugin_dir_url( __FILE__ ) . 'public/js/child-car-seat-selector.js', array( 'jquery', 'jquery-ui-button', 'jquery-ui-slider' ), $plugin_version, true );


//[seatselector]
function seatselector_func($atts)
{
    $options = get_option( 'ccss_options' );
    return 
    '<div class="child-car-seat-selector" data-page-url-slugs=\''.json_encode($options).'\'>
        <div class="inner-container">
            <p>
                <label for="age">Възраст:</label>
                <input type="text" id="age" readonly>
            </p>

            <div id="age-slider"></div>

            <p>
                <label for="weight">Тегло (кг):</label>
                <input type="text" id="weight" readonly>
            </p>

            <div id="weight-slider"></div>

            <p>
                <label for="height">Ръст (см):</label>
                <input type="text" id="height" readonly>
            </p>

            <div id="height-slider"></div>

            <div class="widget">
                <button>Покажи препоръка</button>
            </div>
        </div>
    </div>';
}
add_shortcode('seatselector', 'seatselector_func');

/* Stop Adding Functions Below this Line */

/**
 * custom option and settings
 */
function ccss_settings_init() {
    // Register a new setting for "ccss" page.
    register_setting( 'ccss', 'ccss_options' );

    // Register a new section in the "ccss" page.
    add_settings_section(
        'ccss_section_main',
        __( 'Main', 'ccss' ), 'ccss_section_main_callback',
        'ccss'
    );
 
    // Register a new field in the "ccss_section_main" section, inside the "ccss" page.
    add_settings_field(
        'ccss_field_default_page', // As of WP 4.6 this value is used only internally.
                                // Use $args' label_for to populate the id inside the callback.
            __( 'Default page', 'ccss' ),
        'ccss_field_cb',
        'ccss',
        'ccss_section_main',
        array(
            'label_for'         => 'ccss_field_default_page',
            'hint'              =>  [
                                        'Displayed when no matching seat is found.'
                                    ]
        )
    );

    // Register a new field in the "ccss_section_main" section, inside the "ccss" page.
    add_settings_field(
        'ccss_field_page_1', // As of WP 4.6 this value is used only internally.
                                // Use $args' label_for to populate the id inside the callback.
            __( 'Page 1', 'ccss' ),
        'ccss_field_cb',
        'ccss',
        'ccss_section_main',
        array(
            'label_for'         => 'ccss_field_page_1',
            'hint'              =>  [
                                        'Displayed when <b>age</b> is between <b>0</b> and <b>1.5</b> years, <b>weight</b> is between <b>0</b> and <b>15</b> kg, <b>height</b> is between <b>40</b> and <b>84</b> cm.'
                                    ]
        )
    );

    // Register a new field in the "ccss_section_main" section, inside the "ccss" page.
    add_settings_field(
        'ccss_field_page_2', // As of WP 4.6 this value is used only internally.
                                // Use $args' label_for to populate the id inside the callback.
            __( 'Page 2', 'ccss' ),
        'ccss_field_cb',
        'ccss',
        'ccss_section_main',
        array(
            'label_for'         => 'ccss_field_page_2',
            'hint'              =>  [
                                        'Displayed when <b>age</b> is between <b>1.5</b> and <b>3.5</b> years, <b>weight</b> is between <b>9</b> and <b>18</b> kg, <b>height</b> is between <b>84</b> and <b>100</b> cm.'
                                    ]
        )
    );

    // Register a new field in the "ccss_section_main" section, inside the "ccss" page.
    add_settings_field(
        'ccss_field_page_3', // As of WP 4.6 this value is used only internally.
                                // Use $args' label_for to populate the id inside the callback.
            __( 'Page 3', 'ccss' ),
        'ccss_field_cb',
        'ccss',
        'ccss_section_main',
        array(
            'label_for'         => 'ccss_field_page_3',
            'hint'              =>  [
                                        'Displayed when <b>age</b> is between <b>1.5</b> and <b>12</b> years, <b>weight</b> is between <b>15</b> and <b>36</b> kg, <b>height</b> is between <b>100</b> and <b>125</b> cm.'
                                    ]
        )
    );

    // Register a new field in the "ccss_section_main" section, inside the "ccss" page.
    add_settings_field(
        'ccss_field_page_4', // As of WP 4.6 this value is used only internally.
                                // Use $args' label_for to populate the id inside the callback.
            __( 'Page 4', 'ccss' ),
        'ccss_field_cb',
        'ccss',
        'ccss_section_main',
        array(
            'label_for'         => 'ccss_field_page_4',
            'hint'              =>  [
                                        'Displayed when <b>age</b> is between <b>4</b> and <b>12</b> years, <b>weight</b> is between <b>18</b> and <b>36</b> kg, <b>height</b> is between <b>125</b> and <b>140</b> cm.'
                                    ]
        )
    );

    // Register a new field in the "ccss_section_main" section, inside the "ccss" page.
    add_settings_field(
        'ccss_field_page_5', // As of WP 4.6 this value is used only internally.
                                // Use $args' label_for to populate the id inside the callback.
            __( 'Page 5', 'ccss' ),
        'ccss_field_cb',
        'ccss',
        'ccss_section_main',
        array(
            'label_for'         => 'ccss_field_page_5',
            'hint'              =>  [
                                        'Displayed when <b>age</b> is between <b>4</b> and <b>12</b> years, <b>weight</b> is between <b>18</b> and <b>36</b> kg, <b>height</b> is between <b>140</b> and <b>150</b> cm.'
                                    ]
        )
    );

    // Register a new field in the "ccss_section_main" section, inside the "ccss" page.
    add_settings_field(
        'ccss_field_page_6', // As of WP 4.6 this value is used only internally.
                                // Use $args' label_for to populate the id inside the callback.
            __( 'Page 6', 'ccss' ),
        'ccss_field_cb',
        'ccss',
        'ccss_section_main',
        array(
            'label_for'         => 'ccss_field_page_6',
            'hint'              =>  [
                                        'Displayed when <b>age</b> is between <b>4</b> and <b>12</b> years, <b>weight</b> is between <b>25</b> and <b>40</b> kg, <b>height</b> is between <b>150</b> and <b>160</b> cm.'
                                    ]
        )
    );
}
 
/**
 * Register our wporg_settings_init to the admin_init action hook.
 */
add_action( 'admin_init', 'ccss_settings_init' );

/**
 * Main section callback function.
 *
 * @param array $args  The settings array, defining title, id, callback.
 */
function ccss_section_main_callback( $args ) { }

/**
 * Main section field callback function.
 *
 * WordPress has magic interaction with the following keys: label_for, class.
 * - the "label_for" key value is used for the "for" attribute of the <label>.
 * - the "class" key value is used for the "class" attribute of the <tr> containing the field.
 * Note: you can add custom key value pairs to be used inside your callbacks.
 *
 * @param array $args
 */
function ccss_field_cb( $args ) {
    // Get the value of the setting we've registered with register_setting()
    $options = get_option( 'ccss_options' );
    ?>
    <input id="<?php echo esc_attr( $args['label_for'] ); ?>" value="<?php echo esc_attr( $options[ $args['label_for'] ] ); ?>" name="ccss_options[<?php echo esc_attr( $args['label_for'] ); ?>]"/>
    <?php
    foreach ($args['hint'] as $hint) {
        echo '<p>'.$hint.'</p>';
    }
}

/**
 * Add the top level menu page.
 */
function ccss_options_page() {
    add_menu_page(
        'Car Child Seat Selector',
        'Seat Selector',
        'manage_options',
        'ccss',
        'ccss_options_page_html'
    );
}
 
 
/**
 * Register our ccss_options_page to the admin_menu action hook.
 */
add_action( 'admin_menu', 'ccss_options_page' );

/**
 * Top level menu callback function
 */
function ccss_options_page_html() {
    // check user capabilities
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }
 
    // add error/update messages
 
    // check if the user have submitted the settings
    // WordPress will add the "settings-updated" $_GET parameter to the url
    if ( isset( $_GET['settings-updated'] ) ) {
        // add settings saved message with the class of "updated"
        add_settings_error( 'ccss_messages', 'ccss_message', __( 'Settings Saved', 'ccss' ), 'updated' );
    }
 
    // show error/update messages
    settings_errors( 'ccss_messages' );
    ?>
    <div class="wrap">
        <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
        <form action="options.php" method="post">
            <?php
            // output security fields for the registered setting "ccss"
            settings_fields( 'ccss' );
            // output setting sections and their fields
            // (sections are registered for "ccss", each field is registered to a specific section)
            do_settings_sections( 'ccss' );
            // output save settings button
            submit_button( 'Save Settings' );
            ?>
        </form>
    </div>
    <?php
}

?>
