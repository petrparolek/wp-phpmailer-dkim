<?php
/**
 * @package PHPMailer_DKIM
 * @version 1.0
 */
/*
Plugin Name: DKIM support for WP
Description:
Author: Petr Parolek
Version: 1.0
*/

use Tracy\Debugger;

require_once __DIR__ . '/WPMailerDKIM.php';

if (is_admin()) {
	$wp_mailer_dkim = new WPMailerDKIM();
}

add_filter( 'phpmailer_init', function( $phpmailer ) {
	$options = get_option('wp_mailer_dkim_option_name');
	/** @var \PHPMailer\PHPMailer\PHPMailer $phpmailer */
	$phpmailer->DKIM_domain = $options['domain_0'];
	$phpmailer->DKIM_selector = $options['selector_1'];
	$phpmailer->DKIM_private_string = $options['private_key_2'];
	$phpmailer->DKIM_passphrase = $options['passphrase_3'];
	$phpmailer->DKIM_identity = $phpmailer->From;
	return $phpmailer;
} );
