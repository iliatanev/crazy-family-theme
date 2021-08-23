<?php

/*
    Plugin Name: My Test Plugin
    Description: Atruly amazing plugin
    Version: 1.0
    Author: itanev
*/

class WordCountAndTimePlugin {
    function __construct() {
        add_action( 'admin_menu', array( $this, 'adminPage' ) );
        add_action( 'admin_init', array( $this, 'settings' ) );
    }

    function settings() {
        add_settings_section( 'wcp_first_section', null, null, 'word-count-settings-page' );

        // Location field 
        add_settings_field( 'wpc_location', 'Display Location', array( $this, 'locationHTML' ), 'word-count-settings-page', 'wcp_first_section' );
        register_setting( 'wordcountplugin', 'wcp_location', array( 'sanitize_callback' => 'sanitize_text_field', 'default' => '0' ) );

        // Field for the headline
        add_settings_field( 'wpc_headline', 'Headline', array( $this, 'headlineHTML' ), 'word-count-settings-page', 'wcp_first_section' );
        register_setting( 'wordcountplugin', 'wpc_headline', array( 'sanitize_callback' => 'sanitize_text_field', 'default' => 'Post Statistics' ) );

        // Field for the WordCount
        add_settings_field( 'wpc_wordcount', 'Word Count', array( $this, 'wordCountHTML' ), 'word-count-settings-page', 'wcp_first_section' );
        register_setting( 'wordcountplugin', 'wpc_wordcount', array( 'sanitize_callback' => 'sanitize_text_field', 'default' => '1' ) );

        // Field for the Character Count
        add_settings_field( 'wpc_charcount', 'Character Count', array( $this, 'characterCountHTML' ), 'word-count-settings-page', 'wcp_first_section' );
        register_setting( 'wordcountplugin', 'wpc_wordcount', array( 'sanitize_callback' => 'sanitize_text_field', 'default' => '1' ) );

        // Field for the Read time
        add_settings_field( 'wpc_readtime', 'Read time', array( $this, 'readTimeHTML' ), 'word-count-settings-page', 'wcp_first_section' );
        register_setting( 'wordcountplugin', 'wpc_readtime', array( 'sanitize_callback' => 'sanitize_text_field', 'default' => '1' ) );
    }

    function readTimeHTML() { ?>
        <input type="checkbox" name="wpc_readtime" value="1" <?php checked( get_option( 'wpc_readtime' ), '1' ); ?>>
    <?php }

    function characterCountHTML() { ?>
        <input type="checkbox" name="wpc_charcount" value="1" <?php checked( get_option( 'wpc_charcount' ), '1' ); ?>>
    <?php }

    // This is the third field 
    function wordCountHTML() { ?>
        <input type="checkbox" name="wpc_wordcount" value="1" <?php checked( get_option( 'wpc_wordcount' ), '1' ); ?>>
    <?php }

    // This is handling the second field HTML
    function headlineHTML() { ?>
        <input type="text" name="wpc_headline" value="<?php echo get_option( 'wpc_headline' ); ?>">
    <?php }

        // This is handling the first field HTML
    function locationHTML() { ?>
        <select name="wcp_location">
            <option value="0" <?php selected( get_option( 'wcp_location' ), '0' ); ?>>Beginning of Post</option>
            <option value="1" <?php selected( get_option( 'wcp_location' ), '1' ); ?>>End of Post</option>
        </select>
    <?php }

    function adminPage() {
        add_options_page( 'Word Count Settings', 'Word Count', 'manage_options', 'word-count-settings-page', array( $this, 'justHTML' ) );
    }

    function justHTML() { ?>
        <div class="wrap">
            <h1>Word Count Settings</h1>
            <form action="options.php" method="POST">
                <?php 
                    settings_fields( 'wordcountplugin' );
                    do_settings_sections( 'word-count-settings-page' );
                    submit_button();
                ?>
            </form>
        </div>
    <?php }
}

$wordCountAndTimePlugin = new WordCountAndTimePlugin();