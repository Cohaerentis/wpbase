<?php
/**
 * Teachnova vCard
 */
class TN_vCard {

    static public function person($name, $attributes = array()) {
        $vcard  = "BEGIN:VCARD\n";
        $vcard .= "VERSION:2.1\n";
        $vcard .= "N:{$name}\n";
        $vcard .= "FN:{$name}\n";
        if (!empty($attributes['email']))  $vcard .= "EMAIL;INTERNET:". $attributes['email'] . "\n";
        if (!empty($attributes['mobile'])) $vcard .= "TEL;CELL:" . $attributes['mobile'] . "\n";
        if (!empty($attributes['phone']))  $vcard .= "TEL;WORK:" . $attributes['phone'] . "\n";
        if (!empty($attributes['position']))  $vcard .= "TITLE:" . $attributes['position'] . "\n";
        if (!empty($attributes['organization']))  $vcard .= "ORG:" . $attributes['organization'] . "\n";
        $vcard .= 'END:VCARD';

        return $vcard;
    }
}
