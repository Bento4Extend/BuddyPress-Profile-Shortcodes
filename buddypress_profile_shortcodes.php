<?php
/*
Plugin Name:BuddyPress Profile Shortcodes
Description:This will provide shortcodes to access data in a user's buddypress profile.
Version: 1.0
Author: Bento4Extend
Author URI: http://Extend.BT4.ME
Plugin URI: http://Extend.BT4.ME
*/


function bpsc_plugin_init() {
    require( dirname( __FILE__ ) . '/Bpsc_shortcodes.php');
    $obj = new Bpcs_shortcodes();
}
add_action( 'bp_include', 'bpsc_plugin_init' );

function bpsc_check_buddypress(){
    if(!class_exists('BuddyPress')):
        add_action( 'admin_notices', 'bp_notExist_admin_notice' );
    endif;
}
add_action( 'plugins_loaded', 'bpsc_check_buddypress' );

function bp_notExist_admin_notice() {
    ?>
    <div class="updated">
        <p><?php _e( 'BuddyPress have to be installed so BuddyPress Profile Shortcodes Plugin to work.', 'Bpsc' ); ?></p>
    </div>
<?php
}