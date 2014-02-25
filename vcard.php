<?php
$debug = false;
if ($debug) {
    ini_set( 'error_reporting', -1 );
    ini_set( 'display_errors', 'On' );
}

if (empty($_GET['id'])) { if ($debug) echo 'Empty GET[id]'; die; }
if (!is_numeric($_GET['id'])) { if ($debug) echo 'GET[id] if not numeric'; die; }

/** Sets up the WordPress Environment. */
require( dirname(__FILE__) . '/wp-load.php' );

$id = $_GET['id'];

$person = get_post($id);

if (empty($person)) { if ($debug) echo 'Post not found'; die; }
if ($person->post_status != 'publish') { if ($debug) echo 'Post is not published'; die; }
if ($person->post_type != 'person') { if ($debug) echo 'Post is not a person'; die; }

$name = trim(strip_tags($person->post_title));
$attr = array(
    'position'      => trim(strip_tags($person->post_excerpt)),
    'email'         => get_post_meta($id, 'person_email', true),
    'mobile'        => get_post_meta($id, 'person_mobile', true),
    'organization'  => 'Cohaerentis SL'
);

$vcard = TN_vCard::person($name, $attr);
$filename = $person->post_name . '.vcf';

if (empty($vcard)) { if ($debug) echo 'vCard is empty'; die; }

if ($debug) {
    header('Content-Type: text/html; charset=' . get_option('blog_charset'), true);
    echo '<pre>';
    echo $vcard;
    echo '</pre>';
} else {
    header('Content-Type: text/x-vcard; charset=' . get_option('blog_charset'), true);
    header('Content-Disposition: attachment; filename='.$filename);
    echo $vcard;
}


