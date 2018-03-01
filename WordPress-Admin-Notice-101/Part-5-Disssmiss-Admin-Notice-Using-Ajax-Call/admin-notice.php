<?php

add_action( "admin_notices", "twentyseventeen_admin_notice" );

function twentyseventeen_admin_notice() {

	$notice_container = <<<EOD
<div class="notice is-dismissible %s uniqueclass">
    <p>%s</p>
</div>
EOD;

	$notice = "This is a dismissible admin notice via Ajax Call!";

	printf( $notice_container, "notice-success", esc_html( $notice ) );

}

add_action( "admin_enqueue_scripts", "twentyseventeen_notice_scripts" );

function twentyseventeen_notice_scripts() {
	wp_enqueue_script( "admin-notice-js", get_template_directory_uri() . "/assets/js/admin-notice.js", array( "jquery" ), "1.0", true );
	$ajax_url = admin_url( "admin-ajax.php" );
	$nonce    = wp_create_nonce( "dismissnotice" );
	wp_localize_script( "admin-notice-js", "wpan101", array( "ajaxurl" => $ajax_url, "nonce" => $nonce ) );
}

add_action( "wp_ajax_dismissnotice", "twentyseventeen_dismiss_notice" );

function twentyseventeen_dismiss_notice() {
	if(check_ajax_referer("dismissnotice","nonce")){
		wp_die("yum");
	}
}



















