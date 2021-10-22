<?php
/**
 * @wordpress-plugin
 * Plugin Name: Child car seat selector
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

wp_enqueue_style( $plugin_name, plugin_dir_url( __FILE__ ) . 'public/css/jquery-ui.css', array(), $plugin_version, 'all' );
//wp_enqueue_script( $plugin_name, plugin_dir_url( __FILE__ ) . 'public/js/jquery-ui-1.11.4.js', array( 'jquery' ), $plugin_version, false );
wp_enqueue_script( $plugin_name, plugin_dir_url( __FILE__ ) . 'public/js/child-car-seat-selector.js', array( 'jquery', 'jquery-ui-button', 'jquery-ui-slider' ), $plugin_version, true );


//[seatselector]
function seatselector_func($atts)
{
    return 
    '<div class="child-car-seat-selector">
        <div style="max-width: 350px;display: block;margin: auto;">
            <p>
                <label for="age">Възраст:</label>
                <input type="text" id="age" readonly style="border:0; color:#f6931f; font-weight:bold;">
            </p>

            <div id="age-slider"></div>

            <p>
                <label for="weight">Тегло (кг):</label>
                <input type="text" id="weight" readonly style="border:0; color:#f6931f; font-weight:bold;">
            </p>

            <div id="weight-slider"></div>

            <p>
                <label for="height">Ръст (см):</label>
                <input type="text" id="height" readonly style="border:0; color:#f6931f; font-weight:bold;">
            </p>

            <div id="height-slider"></div>

            <div class="widget" style="text-align: center;">
                <button style="margin-top: 20px;">Покажи препоръка</button>
            </div>
        </div>
    </div>';
}
add_shortcode('seatselector', 'seatselector_func');

/* Stop Adding Functions Below this Line */
?>
