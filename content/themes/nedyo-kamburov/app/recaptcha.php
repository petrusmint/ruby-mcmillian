<?php

/** * Google recaptcha add before the submit button
*/
function add_google_recaptcha($submit_field) {
	$submit_field['submit_field'] = '<div class="g-recaptcha" data-sitekey="you-site-key-here"></div><br>' . $submit_field['submit_field'];
	return $submit_field;
}

/** * Google recaptcha check, validate and catch the spammer
*/
function is_valid_captcha($captcha) {
	$captcha_postdata = http_build_query(array(
	'secret' => 'your-secret-key here',
	'response' => $captcha,
	'remoteip' => $_SERVER['REMOTE_ADDR']));
	$captcha_opts = array('http' => array(
	'method' => 'POST',
	'header' => 'Content-type: application/x-www-form-urlencoded',
	'content' => $captcha_postdata));
	$captcha_context = stream_context_create($captcha_opts);
	$captcha_response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify" , false , $captcha_context), true);
	if ($captcha_response['success'])
	return true;
	else
	return false;
}

function verify_google_recaptcha() {
	$recaptcha = $_POST['g-recaptcha-response'];
	if (empty($recaptcha))
	wp_die( _("<b>ERROR:</b> please select <b>I'm not a robot!</b><p><a href='javascript:history.back()'>« Back</a></p>"));
	else if (!is_valid_captcha($recaptcha))
	wp_die( _("<b>Go away SPAMMER!</b>"));
}


?>